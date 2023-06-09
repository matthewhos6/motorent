<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Strings;

class usercontroller extends Controller
{
    public function home()
    {
        $barang = barang::where('Status','=',1)->get();
        // dd($barang);
        $user = DB::select("SELECT * FROM user WHERE username = ? limit 1",[Session::get("login")]);
        return view('user.home',[
            'user' => $user,
            'listbarang' => $barang
        ]);
    }
    
    public function profil()
    {
        $user = DB::select("SELECT * FROM user WHERE username = ? limit 1",[Session::get("login")]);
        // dd($user[0]);
        return view('user.profil',[
            'user' => $user[0]
        ]);
    }

    public function detailbarang($id, Request $req)
    {
        $barang = barang::find($id);
        return view('user.detail_barang',[
            'barang' => $barang
        ]);

    }

    public function passing(Request $req)
    {
        Session::put('harga',$req->harga);
        Session::put('hari',$req->thari);
        return redirect()->to(url()->current()."/konfirmasi");
    }

    public function konfirmasi($id){

        $user = User::where('username','=',Session::get('login'))->first();
        $barang = barang::find($id);
        //midtrans
        \Midtrans\Config::$serverKey = 'SB-Mid-server-71iRc-1uVVdAXCs_PXk9cB2q';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => Session::get('harga'),
            ),
            'customer_details' => array(

                'first_name' => $user->fullname,
                'email' => $user->Email,
                'phone' =>$user->Telepon,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('user.konfirmasi',[
            'user' => $user,
            'token' => $snapToken,
            'tipe' => $barang->Nama_Motor
        ]);
    }

    public function cout($id,Request $request){
        $user = User::where('username','=',Session::get('login'))->first();
        $data = json_decode($request->json);
        $barang = barang::find($id);
        // dd($barang);
        $start = Carbon::now();
        $end = Carbon::now()->addDay(Session::get('hari'));


        $new = new transaksi();
        $new->FK_ID_USER = $user->ID_User;
        $new->FK_ID_Barang = $barang->ID_Barang;
        $new->Total=  $data->gross_amount;
        $new->Tanggal_Trans=  $data->transaction_time;
        $new-> Start_Date = $start;
        $new-> End_Date = $end;
        $new->status = 0;
        $new->save();

        DB::table('barang')->where('ID_Barang','=',$id)->update(['status'=> 0]);

        return redirect()->to(route('home_user'));


    }

    public function returned(Request $request)
    {
        DB::table('transaksi')->where('ID_Trans', $request->id)->update([
            'Status' => 2
        ]);
        DB::table('barang')->where('ID_Barang', $request->btnReturn)->update([
            'Status' => 1
        ]);
        return redirect()->back();
    }
}
