<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ChamCongController,
};
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('cham-cong')->name('chamcong.')->group(function() {
//     Route::resource('/', ChamCongController::class)->only(['index', 'store', 'update']);
// });

Route::prefix('cham-cong')->name('chamcong.')->group(function() {
    Route::get('/', [ChamCongController::class, 'index'])->name('index');
    Route::post('/', [ChamCongController::class, 'store'])->name('store');
    Route::post('/checkout', [ChamCongController::class, 'checkOut'])->name('checkout');
});