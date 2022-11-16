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

    public function logout(){
        Session::forget('logid');
        Session::forget('loguser');
        return redirect(url("/admin/login"));
    }

}