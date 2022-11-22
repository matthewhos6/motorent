<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class logregcontroller extends Controller
{
    public function login(Request $req){
        $req->validate([
            'username' => 'required',
            'pass' => 'required'
        ]);

        $user = DB::table('user')->where('username','=',$req->username)
        ->orWhere('email','=',$req->username)->first();

        if ($user!=null) {
            $cek = password_verify($req->pass,$user->Password);
            if ($cek) {
                Session::put('login',$req->username);
                return redirect(route('home_user'));
            }else{
                return back()->with('err','Password tidak benar');
            }
        }else{
            return back()->with('err','User belum terdaftar');
        }
    }

    public function register(Request $req)
    {
        $req->validate([
            'username' => 'required|alpha_num',
            'fullname' => 'required',
            'NIK' => 'numeric|min:16',
            'telepon' => 'required|numeric|min:10',
            'email' => 'required|email',
            'pass' => 'required|alpha_num',
            'conf' => 'required'
        ]);

        // $cek = User::find()->where('username','=',$req->username)
        //                     ->where('email','=',$req->email);
        $cek = DB::table('user')->where('username','=',$req->username)
        ->where('email','=',$req->email)
        ->get();

        if ($cek == null) {
            return back()->with('err','Username atau email sudah terdaftar')->withInput();
        }else{
            if ($req->pass != $req->conf) {
                return back()->with('err','Pass dan confirm tidak sama')->withInput();
            }else{
                $new = new User();
                $new->fullname = $req->fullname;
                $new->NIK = $req->NIK;
                $new->Telepon = $req->telepon;
                $new->Username = $req->username;
                $new->Email = $req->email;
                $new->Password = password_hash($req->pass,PASSWORD_DEFAULT);
                $new->Status = 0;
                $new->save();
                return back()->with('suc','Berhasil Register');
            }
        }
    }
}
