<?php

use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\PromoCodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\ContentImageController;
use App\Http\Controllers\Admin\ContentDocumentController;
use App\Http\Controllers\Admin\ContentVideoController;
use App\Http\Controllers\Admin\PageController;

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

Route::get('/', [AuthController::class, 'login']);
Route::get('login', [AuthController::class, 'login'])->name('admin.login');
Route::post('do_login', [AuthController::class, 'doLogin'])->name('admin.do_login');

Route::group(['middleware' => 'admin'], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('home', [PageController::class, 'home'])->name('admin.home');
    Route::post('storeHomePage', [PageController::class, 'storeHomePage'])->name('admin.storeHomePage');

    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('storeSettings', [AdminController::class, 'storeSettings'])->name('admin.storeSettings');

    // promo codes start
    Route::resource('promo', PromoCodeController::class, ['as' => 'admin'])->except('show');
    // promo code end

    Route::resource('coupons', CouponController::class, ['as' => 'admin']);
    Route::resource('categories', CategoryController::class, ['as' => 'admin']);
    Route::resource('product', ProductController::class, ['as' => 'admin']);
    Route::resource('subscriptions', SubscriptionController::class, ['as' => 'admin'])->except(['show', 'destroy']);
    Route::resource('content_images', ContentImageController::class, ['as' => 'admin'])->except(['show']);
    Route::resource('content_documents', ContentDocumentController::class, ['as' => 'admin'])->except(['show']);
    Route::resource('content_videos', ContentVideoController::class, ['as' => 'admin'])->except(['show']);
});
