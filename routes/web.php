<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    KhachHangController,
    KhoController,
    ChamCongController,
};

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

Route::prefix('/')->name('dashboard.')->group(function() {
    Route::resource('/', DashboardController::class);
});

Route::prefix('khach-hang')->name('khachhang.')->group(function() {
    // Route::get('/tra-cuu-khach-hang', [KhachHangController::class, 'index'])->name('tra-cuu-khach-hang');
    Route::get('/', [KhachHangController::class, 'index'])->name('index');
    Route::get('/find', [KhachHangController::class, 'find'])->name('tra-cuu');
    Route::post('/find', [KhachHangController::class, 'find'])->name('find');
    Route::get('/{id}/edit', [KhachHangController::class, 'edit'])->name('edit');
    Route::get('/create', [KhachHangController::class, 'create'])->name('create');
    // Route::resource('/', KhachHangController::class);
});

Route::prefix('kho')->name('kho.')->group(function() {
    Route::resource('/', KhoController::class);
    Route::get('/fake-data', [KhoController::class, 'fakedata']);
    Route::get('/nhap-kho', [KhoController::class, 'nhapKho'])->name('nhapkho');
});

// Route::prefix('cham-cong')->name('chamcong.')->group(function() {
//     Route::resource('/', ChamCongController::class)->only(['index', 'store', 'update', 'destroy']);
// });

// Route::prefix('cham-cong')->name('chamcong.')->group(function() {
//     // Route::resource('/', ChamCongController::class)->only(['index', 'store', 'update']);
//     Route::get('/', [ChamCongController::class, 'index'])->name('index');
//     Route::post('/', [ChamCongController::class, 'store'])->name('store');
//     Route::get('/{id}', [ChamCongController::class, 'update'])->name('update');
// });