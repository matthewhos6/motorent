<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class usercontroller extends Controller
{
    public function home()
    {
        $user = User::where('username','=',Session::get('login'))->first();
        return view('user.home',[
            'user' => $user
        ]);
    }
}
