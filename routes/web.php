<?php

use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ContentStoreController;


Auth::routes();
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('about-us', [App\Http\Controllers\HomeController::class, 'aboutUs'])->name('about-us');

Route::controller(ContentStoreController::class)->group(function () {
    Route::get('content-store', 'index')->name('content-store');
});

Route::controller(CouponController::class)->group(function () {
    Route::get('coupons', 'index')->name('coupons');
});

Route::controller(ShopController::class)->group(function(){
    Route::get('shop', 'index')->name('shop.home');
    Route::get('product-detail/{p_id}', 'detail')->name('shop.product.detail');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::resource('payment-methods', App\Http\Controllers\PaymentMethodController::class);
    Route::get('membership', [MembershipController::class, 'index'])->name('membership');
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('edit-profile', [App\Http\Controllers\HomeController::class, 'editProfile'])->name('edit-profile');
    Route::post('update-profile', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('update-profile');
});
