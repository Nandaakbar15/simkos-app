<?php

use App\Http\Controllers\BillsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KostsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TenantsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/loginPage', [LoginController::class, 'loginPage'])->name('login');
Route::post('/handleLogin', [LoginController::class, 'handleLogin']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/home', [DashboardController::class, 'home'])->name('dashboard');

        // url data user
        Route::prefix('user')->group(function () {
            Route::get('/data_user', [UserController::class, 'index']);
        });

        // url data kosts
        Route::prefix('kosts')->group(function () {
            Route::get('/data_kosts', [KostsController::class, 'index']);
            Route::get('/view_form_tambah_data_kosts', [KostsController::class, 'create']);
            Route::post('/tambah_data_kosts', [KostsController::class, 'store']);
            Route::get('/view_form_edit_data_kosts/{kosts}', [KostsController::class, 'edit']);
            Route::delete('/delete_data_kosts/{kosts}', [KostsController::class, 'destroy']);
        });

        // url data kamar
        Route::prefix('kamar')->group(function () {
            Route::get('/data_kamar', [RoomController::class, 'index']);
            Route::get('/view_form_tambah_data_kamar', [RoomController::class, 'create']);
            Route::post('/tambah_data_kamar', [RoomController::class, 'store']);
            Route::get('/view_form_edit_data_kamar/{room}', [RoomController::class, 'edit']);
            Route::put('/edit_data_kamar/{room}', [RoomController::class, 'update']);
        });

        // url data penyewa
        Route::prefix('penyewa')->group(function () {
            Route::get('/data_penyewa', [TenantsController::class, 'index']);
            Route::get('/view_form_tambah_data_penyewa', [TenantsController::class, 'create']);
            Route::post('/tambah_data_penyewa', [TenantsController::class, 'store']);
            Route::get('/view_form_edit_data_penyewa/{tenants}', [TenantsController::class, 'edit']);
            Route::put('/edit_data_penyewa/{tenants}', [TenantsController::class, 'update']);
            Route::delete('/delete_data_penyewa', [TenantsController::class, 'destroy']);
        });

        // url data sewa / kontrak
        Route::prefix('sewa_kontrak')->group(function () {
            Route::get('/data_sewa_kontrak', [RentalsController::class, 'index']);
            Route::get('/view_form_tambah_data_sewa_kontrak', [RentalsController::class, 'create']);
            Route::post('/tambah_data_sewa_kontrak', [RentalsController::class, 'store']);
            Route::get('/view_form_edit_data_sewa_kontrak/{rentals}', [RentalsController::class, 'edit']);
            Route::put('/edit_data_sewa_kontrak/{rentals}', [RentalsController::class, 'update']);
            Route::delete('/delete_data_sewa_kontrak/{rentals}', [RentalsController::class, 'destroy']);
        });

        // url data tagihan bulanan
        Route::prefix('tagihan')->group(function () {
            Route::get('/data_tagihan', [BillsController::class, 'index']);
            Route::get('/view_form_tambah_data_tagihan', [BillsController::class, 'create']);
            Route::post('/tambah_data_tagihan', [BillsController::class, 'store']);
            Route::get('/view_form_edit_data_tagihan/{bills}', [BillsController::class, 'edit']);
            Route::put('/edit_data_tagihan/{bills}', [BillsController::class, 'update']);
            Route::delete('/delete_data_tagihan/{bills}', [BillsController::class, 'destroy']);
        });

        // url data pembayaran
        Route::prefix('pembayaran')->group(function () {
            Route::get('/data_pembayaran', [PaymentsController::class, 'index']);
        });
    });
});
