<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\users;
use Illuminate\Contracts\Session\Session as SessionSession;
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
            if ($value->Username_Karyawan == $request->username &&  password_verify($request->password,$value->Password_Karyawan)) {
                $log = true;
                $logid = $value->ID_Karyawan;
                $loguser = $value->Nama_Karyawan;
                $jabatan = $value->FK_ID_JABATAN;
            };
        }
        if($log){
            Session::put('logid', $logid);
            Session::put('loguser', $loguser);
            Session::put('admin', 'admin');
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
            DB::table('transaksi')->where('ID_Trans', $request->trans)->update(['FK_ID_Karyawan' => $request->karyawan , 'Status' => 1,'kode_ambil'=>Str::random(7)]);
        }
        return redirect(url("/admin/transaksi"));
    }

    public function ambilmotor(Request $request)
    {
        # code...
        // dd("oek");
        $table=DB::table('transaksi')->where('ID_Trans', $request->trans)->first();
        // dd($table->kode_ambil);
        if ($table->kode_ambil==$request->inp_kode) {
            # code...
            DB::table('transaksi')->where('ID_Trans', $request->trans)->update(['sudah_diambil' => 1]);
        }
        else {
            Session::put("salah".$request->trans,"Kode ambil salah");
        }
        return back();
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
        Session::forget('logid');
        Session::forget('loguser');
        Session::forget('filtertrans');
        Session::forget('filterreport');
        Session::forget('startDate');
        Session::forget('endDate');
        Session::forget('caribarang');
        Session::forget('admin');
        return redirect(url("/admin/login"));
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

        //tak kasih pengecekan supaya ga error kalo admin ga insert foto ktp
        if ($request->file("photo") != null) {
            $namaFolderPhoto = ""; $namaFilePhoto = "";
            foreach ($request->file("photo") as $photo) {
                $namaFilePhoto  = Str::random(8).".".$photo->getClientOriginalExtension();
                $namaFolderPhoto = "photo/";

                $photo->move(public_path($namaFolderPhoto),$namaFilePhoto); // masuk ke folder public/photo
            }
            DB::table('karyawan')->insert(
                [
                    'Nama_Karyawan' => $request->nama,
                    'Username_Karyawan' => $request->username,
                    "NomorTelepon_Karyawan" => $request->noTelp,
                    "Password_Karyawan" => password_hash($request->password,PASSWORD_DEFAULT),
                    "FK_ID_JABATAN" => $request->jabatan,
                    "KTP_Karyawan" => $namaFilePhoto
                ]
            );
        }
        else {
            DB::table('karyawan')->insert(
                [
                    'Nama_Karyawan' => $request->nama,
                    'Username_Karyawan' => $request->username,
                    "NomorTelepon_Karyawan" => $request->noTelp,
                    "Password_Karyawan" => password_hash($request->password,PASSWORD_DEFAULT),
                    "FK_ID_JABATAN" => $request->jabatan,
                    "KTP_Karyawan" => null
                ]
            );
        }
        return redirect()->route('tambahkaryawan')->with('msg', 'Karyawan '.$request->nama.' ditambah!');
        
    }

    public function detailbarang(Request $request){
        $listBarang = DB::table('barang')->where('ID_Barang', $request->btnDetailBarang)->get();
        return view('admin.detailbarang', compact('listBarang'));
    }

    public function actionbarang(Request $request){
        $namaFilePhoto = "";
        if ($request->file("photo") != null) {
            
            $nameFilePhoto  = Str::random(8);
            // dd(count($request->file("photo")));
            for ($i=0; $i < count($request->file("photo")); $i++) { 
                # code...
                // dd($i);
                $namaFilePhoto  = $nameFilePhoto."-".$i.".jpg";
                $namaFolderPhoto = "photo/";
    
                $request->file("photo")[$i]->move(public_path($namaFolderPhoto),$namaFilePhoto); // masuk ke folder public/photo
            }
            // foreach ($request->file("photo") as $photo) {
            // }
        }
        if ($request->btnEditBarang != null) {
            //tak buat pengecekan biar klo admin ga update gambar, gambar ga akan kerubah/null
            if ($namaFilePhoto != "") {
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
                    'gambar' => $namaFilePhoto,
                   'jumlah_gambar' => count($request->file("photo"))
                ]);
                return redirect()->route('barang')->with('msg', 'Berhasil update motor '.$request->nama);
            }
            else {
                $listBarang = DB::table('barang')->get();
                $jumlah = 0;
                foreach ($listBarang as $value) {
                    if ($value->ID_Barang == $request->btnEditBarang) {
                        $jumlah = $value->jumlah_gambar;
                    };
                }
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
                    'jumlah_gambar' => $jumlah
                ]);
                return redirect()->route('barang')->with('msg', 'Berhasil update motor '.$request->nama);
            }
        }else if ($request->btnDeleteBarang != null) {
            DB::delete('delete from barang where ID_Barang = ?',
            [
                $request->btnDeleteBarang
            ]);
            return redirect()->route('barang')->with('msg', 'Berhasil hapus motor '.$request->nama);
        }
        Session::forget('caribarang');
        // return redirect(url("/admin/gudang"));
    }

    public function searchbarang(Request $request){
        //Session::put('caribarang', $request->cari);
        if ($request->cari == null) {
            $searched = $request->cari;
            return view('admin.gudang', compact("searched"));
        }else{
            return redirect(url("/admin/searchbarang/".$request->cari));
        }
    }

    public function getsearchbarang(Request $request){
        $searched = $request->nama;
        return view('admin.gudang', compact("searched"));
    }

    public function tambahbarang(Request $request){
        return view('admin.tambahbarang');
    }

    public function menambahbarang(Request $request){
        $nameFilePhoto = "";
        if ($request->file("photo") != null) {
            
            $nameFilePhoto  = Str::random(8);
            // dd(count($request->file("photo")));
            for ($i=0; $i < count($request->file("photo")); $i++) { 
                # code...
                // dd($i);
                $namaFilePhoto  = $nameFilePhoto."-".$i.".jpg";
                $namaFolderPhoto = "photo/";
    
                $request->file("photo")[$i]->move(public_path($namaFolderPhoto),$namaFilePhoto); // masuk ke folder public/photo
            }
            // foreach ($request->file("photo") as $photo) {
            // }
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
                'gambar' => $nameFilePhoto,
                'jumlah_gambar' => count($request->file("photo"))
            ]
        );
        return redirect()->route('barang')->with('msg', 'Berhasil tambah motor '.$request->nama);
    }

}