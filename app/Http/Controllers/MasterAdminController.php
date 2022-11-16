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
        return view("admin.login");
    }

}