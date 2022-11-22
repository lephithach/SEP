<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    KhachHangController,
    KhoController,
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

Route::get('/', function () {
    return view('home')->name('home');
});

Route::prefix('khach-hang')->group(function() {
    Route::get('/tra-cuu-khach-hang', [KhachHangController::class, 'index'])->name('tra-cuu-khach-hang');
    Route::post('/tra-cuu-khach-hang', [KhachHangController::class, 'show'])->name('tra-cuu-khach-hang.post');

});

Route::get('kho/fake-data', [KhoController::class, 'fakedata']);
Route::resource('kho', KhoController::class);
