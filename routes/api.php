<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CouponController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::controller(\App\Http\Controllers\ContentStoreController::class)->group(function () {
    Route::post('download-content', 'download')->name('download-content');
    Route::get('test-email', 'testEmail');
});

Route::post('applyCouponPromo', [CouponController::class, 'applyPromo'])->name('applyCouponPromo');
