<?php

use App\Http\Controllers\Admin\PromoCodeController;

use App\Http\Controllers\MembershipController;

use App\Http\Controllers\ShopController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('home');
});*/

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('about-us', [App\Http\Controllers\HomeController::class, 'aboutUs'])->name('about-us');

Route::get('membership', [MembershipController::class, 'index'])->name('membership');
Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('edit-profile', [App\Http\Controllers\HomeController::class, 'editProfile'])->name('edit-profile');
Route::post('update-profile', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('update-profile');
Route::get('payment', [App\Http\Controllers\HomeController::class, 'payment'])->name('payment');

Route::controller(ShopController::class)->group(function(){
    Route::get('shop', 'index')->name('shop.home');
    Route::get('product-detail/{p_id}', 'detail')->name('shop.product.detail');
});
Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

