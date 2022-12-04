<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class usercontroller extends Controller
{
    public function home()
    {
        $barang = barang::all();
        $user = User::where('username','=',Session::get('login'))->first();
        return view('user.home',[
            'user' => $user,
            'listbarang' => $barang
        ]);
    }

    public function profil()
    {
        $user = User::where('username','=',Session::get('login'))->first();
        return view('user.profil',[
            'user' => $user
        ]);
    }

    public function detailbarang($id)
    {
        $barang = barang::find($id);
        return view('user.detail_barang',[
            'barang' => $barang
        ]);
    }

    public function konfirmasi(Request $request){
        $user = User::where('username','=',Session::get('login'))->first();

        //midtrans
        \Midtrans\Config::$serverKey = 'SB-Mid-server-71iRc-1uVVdAXCs_PXk9cB2q';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->harga,
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
            'token' => $snapToken
        ]);
    }

    public function cout(Request $request){
        $data = json_decode($request->json);
        dd($data);
    }
}
