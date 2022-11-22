<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function home()
    {
        return view('user.home');
    }
}
