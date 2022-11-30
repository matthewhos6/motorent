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

    public function konfirmasi($id){
        $user = User::where('username','=',Session::get('login'))->first();
        $barang = barang::find($id);
        return view('user.detail_barang',[
            'barang' => $barang,
            'user' => $user
        ]);
    }
}
