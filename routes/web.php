<?php

use App\Http\Controllers\MasterAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix("/admin")->group(function() {
    Route::get('/login', function () {
        return view('admin.login');
    });
    Route::POST("/logging", [MasterAdminController::class, "login"]);
    Route::POST("/logout", [MasterAdminController::class, "logout"]);

    Route::get('/transaksi', function () {
        return view('admin.transaksi');
    });
    Route::get('/gudang', function () {
        return view('admin.gudang');
    });
    Route::get('/manager', function () {
        return view('admin.manager');
    });
});
