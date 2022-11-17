<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\users;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MasterAdminController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];
        $messages = [
            "required" => ":attribute kosong"
        ];
        $request->validate($rules, $messages);

        $listUser = DB::table('karyawan')->get();
        $log = false;
        $logid = "";
        $loguser = "";
        $jabatan = 0;
        foreach ($listUser as $value) {
            if ($value->Username_Karyawan == $request->username && $value->Password_Karyawan == $request->password) {
                $log = true;
                $logid = $value->ID_Karyawan;
                $loguser = $value->Nama_Karyawan;
                $jabatan = $value->FK_ID_JABATAN;
            };
        }
        if($log){
            Session::put('logid', $logid);
            Session::put('loguser', $loguser);
            if ($jabatan == 0) {
                return redirect(url("/admin/transaksi"));
            }else if ($jabatan == 1) {
                return redirect(url("/admin/gudang"));
            }else if ($jabatan == 2) {
                return redirect(url("/admin/manager"));
            }
        }else{
            return redirect()->back()->with('msg', 'Username/Password Salah!');
        }
    }

    public function filtertrans(Request $request){
        Session::put('filtertrans', $request->filter);
        return redirect(url("/admin/transaksi"));
    }

    public function transstatus(Request $request){
        if ($request->btnRejectTrans == 1) {
            DB::table('transaksi')->where('ID_Trans', $request->trans)->update(['FK_ID_Karyawan' => $request->karyawan , 'Status' => -1]);
        }else{
            DB::table('transaksi')->where('ID_Trans', $request->trans)->update(['FK_ID_Karyawan' => $request->karyawan , 'Status' => 1]);
        }
        return redirect(url("/admin/transaksi"));
    }

    public function filterreport(Request $request){
        if ($request->filter != null) {
            Session::put('filterreport', $request->filter);
        }
        if ($request->filter == 2 || $request->filter == 3 || $request->filter == 4 || $request->filter == 5) {
            Session::forget('startDate');
            Session::forget('endDate');
        }else{
            Session::put('startDate', $request->dateAwal);
            Session::put('endDate', $request->dateAkhir);
        }

        if ($request->resetDate == 1) {
            Session::forget('startDate');
            Session::forget('endDate');
        }
        return redirect(url("/admin/manager"));
    }

    public function logout(Request $request){
        if ($request->btnLogout == 1) {
            Session::forget('logid');
            Session::forget('loguser');
            Session::forget('filtertrans');
            Session::forget('filterreport');
            Session::forget('startDate');
            Session::forget('endDate');
            Session::forget('caribarang');
            return redirect(url("/admin/login"));
        }
        if ($request->btnReport == 1) {
            return redirect(url("/admin/manager"));
        }
        if ($request->btnListKaryawan == 1) {
            Session::forget('carikaryawan');
            return redirect(url("/admin/listkaryawan"));
        }
        if ($request->btnListBarang == 1) {
            return redirect(url("/admin/gudang"));
        }
    }

    public function searchkaryawan(Request $request){
        Session::put('carikaryawan', $request->cari);
        return redirect(url("/admin/listkaryawan"));
    }

    public function tambahkaryawan(Request $request){
        return view('admin.masterkaryawan');
    }

    public function menambahkaryawan(Request $request){
        // - php artisan storage:link
        $namaFolderPhoto = ""; $namaFilePhoto = "";
        foreach ($request->file("photo") as $photo) {
            $namaFilePhoto  = Str::random(8).".".$photo->getClientOriginalExtension();
            $namaFolderPhoto = "photo/";

            $photo->storeAs($namaFolderPhoto,$namaFilePhoto, 'public'); // masuk ke storage/app/public
        }
        DB::table('karyawan')->insert(
            [
                'Nama_Karyawan' => $request->nama,
                'Username_Karyawan' => $request->username,
                "NomorTelepon_Karyawan" => $request->noTelp,
                "Password_Karyawan" => $request->password,
                "FK_ID_JABATAN" => $request->jabatan,
                "KTP_Karyawan" => $namaFilePhoto
            ]
        );
        return view('admin.masterkaryawan');
    }

    public function detailbarang(Request $request){
        $listBarang = DB::table('barang')->where('ID_Barang', $request->btnDetailBarang)->get();
        return view('admin.detailbarang', compact('listBarang'));
    }

    public function actionbarang(Request $request){
        $namaFilePhoto = "";
        if ($request->file("photo") != null) {
            $namaFolderPhoto = "";
            foreach ($request->file("photo") as $photo) {
                $namaFilePhoto  = Str::random(8).".".$photo->getClientOriginalExtension();
                $namaFolderPhoto = "photo/";
    
                $photo->storeAs($namaFolderPhoto,$namaFilePhoto, 'public'); // masuk ke storage/app/public
            }
        }
        if ($request->btnEditBarang != null) {
            DB::table('barang')->where('ID_Barang', $request->btnEditBarang)->update([
                'Nama_Motor' => $request->nama,
                'Warna_Motor' => $request->warna,
                'Isi_Silinder' => $request->silinder,
                'Harga_sewa' => $request->harga,
                'Plat' => $request->plat,
                'Tahun_Pembuatan' => $request->tahun,
                'No_Rangka' => $request->rangka,
                'No_Mesin' => $request->mesin,
                'No_BPKB' => $request->bpkb,
                'No_STNK' => $request->stnk,
                'Status' => $request->status,
                'gambar' => $namaFilePhoto
            ]);
        }else if ($request->btnDeleteBarang != null) {
            DB::delete('delete from barang where ID_Barang = ?',
            [
                $request->btnDeleteBarang
            ]);
        }
        Session::forget('caribarang');
        return redirect(url("/admin/gudang"));
    }

    public function searchbarang(Request $request){
        Session::put('caribarang', $request->cari);
        return redirect(url("/admin/gudang"));
    }

    public function tambahbarang(Request $request){
        return view('admin.tambahbarang');
    }

    public function menambahbarang(Request $request){
        $namaFilePhoto = "";
        if ($request->file("photo") != null) {
            $namaFolderPhoto = "";
            foreach ($request->file("photo") as $photo) {
                $namaFilePhoto  = Str::random(8).".".$photo->getClientOriginalExtension();
                $namaFolderPhoto = "photo/";
    
                $photo->storeAs($namaFolderPhoto,$namaFilePhoto, 'public'); // masuk ke storage/app/public
            }
        }
        DB::table('barang')->insert(
            [
                'Nama_Motor' => $request->nama,
                'Warna_Motor' => $request->warna,
                'Isi_Silinder' => $request->silinder,
                'Harga_sewa' => $request->harga,
                'Plat' => $request->plat,
                'Tahun_Pembuatan' => $request->tahun,
                'No_Rangka' => $request->rangka,
                'No_Mesin' => $request->mesin,
                'No_BPKB' => $request->bpkb,
                'No_STNK' => $request->stnk,
                'Status' => 1,
                'gambar' => $namaFilePhoto
            ]
        );
        return view('admin.gudang');
    }

}