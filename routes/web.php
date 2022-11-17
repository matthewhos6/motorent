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
    Route::POST("/filtertrans", [MasterAdminController::class, "filtertrans"]);
    Route::POST("/transstatus/{trans}/{karyawan}", [MasterAdminController::class, "transstatus"]);
    Route::POST("/filterreport", [MasterAdminController::class, "filterreport"]);
    Route::POST("/searchkaryawan", [MasterAdminController::class, "searchkaryawan"]);
    Route::POST("/tambahkaryawan", [MasterAdminController::class, "tambahkaryawan"]);
    Route::POST("/menambahkaryawan", [MasterAdminController::class, "menambahkaryawan"]);
    Route::POST("/detailbarang", [MasterAdminController::class, "detailbarang"]);
    Route::POST("/actionbarang", [MasterAdminController::class, "actionbarang"]);
    Route::POST("/searchbarang", [MasterAdminController::class, "searchbarang"]);
    Route::POST("/tambahbarang", [MasterAdminController::class, "tambahbarang"]);
    Route::POST("/menambahbarang", [MasterAdminController::class, "menambahbarang"]);
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
    Route::get('/listkaryawan', function () {
        return view('admin.listkaryawan');
    });
});
