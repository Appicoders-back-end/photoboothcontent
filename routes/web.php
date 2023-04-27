<?php

use App\Http\Controllers\MembershipController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ContentStoreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\VerificationController;


Auth::routes(['verify' => true]);
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('memberships', [MembershipController::class, 'index'])->name('memberships');
Route::get('thankyou', [HomeController::class, 'thankyou'])->name('thankyou');

Route::controller(ContentStoreController::class)->group(function () {
    Route::get('content-store', 'index')->name('content-store');
});

Route::controller(CouponController::class)->group(function () {
    Route::get('coupons', 'index')->name('coupons');
});

Route::controller(ShopController::class)->group(function () {
    Route::get('shop', 'index')->name('shop.home');
    Route::get('product-detail/{p_id}', 'detail')->name('shop.product.detail');
    Route::get('cart', 'cart')->name('shop.cart');
    Route::get('add-to-cart/{id}', 'addToCart')->name('shop.add.to.cart');
    Route::get('remove-cart-item/{id}','deleteCartItem')->name('shop.remove.item.cart');
    Route::get('update-cart-item/{id}','updateCartItem')->name('shop.update.item.cart');
    Route::get('checkout','checkout')->name('shop.checkout');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('edit-profile', [HomeController::class, 'editProfile'])->name('edit-profile');
    Route::get('change-password', [HomeController::class, 'changePassword'])->name('changePassword');
    Route::post('update-password', [HomeController::class, 'updatePassword'])->name('updatePassword');
    Route::post('update-profile', [HomeController::class, 'updateProfile'])->name('update-profile');
    Route::resource('payment-methods', PaymentMethodController::class);
    Route::get('my-coupons', [CouponController::class, 'myCoupons'])->name('myCoupons');
    Route::get('my-downloads', [ContentStoreController::class, 'myDownloads'])->name('myDownloads');

    /*buy membership*/
    Route::get('buyMembership/{subscription}', [MembershipController::class, 'membershipCheckout'])->name('membershipCheckout');
    Route::post('buyMembership', [MembershipController::class, 'buyMembership'])->name('buyMembership');

    /*buy coupon*/
    Route::get('buyCoupon/{coupon}', [CouponController::class, 'couponCheckout'])->name('couponCheckout');
    Route::post('buyCoupon', [CouponController::class, 'buyCoupon'])->name('buyCoupon');

    /* account verified*/
    Route::get('verified', [VerificationController::class, 'verified'])->name('verified');
});
