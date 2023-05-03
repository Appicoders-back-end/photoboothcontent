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
use App\Http\Controllers\Admin\OrderController;

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
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('home', [PageController::class, 'home'])->name('admin.home');
    Route::get('about', [PageController::class, 'about'])->name('admin.about');
    Route::get('content', [PageController::class, 'content'])->name('admin.content');
    Route::get('membership', [PageController::class, 'membership'])->name('admin.membership');
    Route::get('coupon', [PageController::class, 'coupon'])->name('admin.coupon');

    Route::post('storeHomePage', [PageController::class, 'storeHomePage'])->name('admin.storeHomePage');
    Route::post('storeAboutPage', [PageController::class, 'storeAboutPage'])->name('admin.storeAboutPage');
    Route::post('storeContentPage', [PageController::class, 'storeContentPage'])->name('admin.storeContentPage');
    Route::post('storeMembershipPage', [PageController::class, 'storeMembershipPage'])->name('admin.storeMembershipPage');
    Route::post('storeCouponPage', [PageController::class, 'storeCouponPage'])->name('admin.storeCouponPage');

    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('change-user-status/{id}', [UserController::class, 'changeStatus'])->name('admin.users.changeStatus');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('storeSettings', [AdminController::class, 'storeSettings'])->name('admin.storeSettings');

    // promo codes start
    Route::resource('promo', PromoCodeController::class, ['as' => 'admin'])->except('show');
    Route::get('change-promo-status/{id}', [PromoCodeController::class, 'changeStatus'])->name('admin.promo.changeStatus');
    // promo code end

    Route::resource('coupons', CouponController::class, ['as' => 'admin']);
    Route::resource('categories', CategoryController::class, ['as' => 'admin']);
    Route::get('change-categories-status/{id}', [CategoryController::class, 'changeStatus'])->name('admin.categories.changeStatus');
    Route::get('product-image/{p_image_id}/delete', [ProductController::class, 'deletePImage'])->name('admin.product.image.destroy');
    Route::resource('product', ProductController::class, ['as' => 'admin']);
    Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::get('change-order-status/{id}', [OrderController::class, 'orderStatus'])->name('admin.orders.status');
    Route::post('/upload',[ProductController::class,'storeDrpzone'])->name('dropzone.store');
    Route::post('uploads', [ProductController::class,'uploads'])->name('dropzone.uploads');
    Route::post('image/delete',[ProductController::class,'fileDestroy'])->name('dropzone.image.delete');

    Route::resource('subscriptions', SubscriptionController::class, ['as' => 'admin'])->except(['show', 'destroy']);
    Route::resource('content_images', ContentImageController::class, ['as' => 'admin'])->except(['show']);
    Route::resource('content_documents', ContentDocumentController::class, ['as' => 'admin'])->except(['show']);
    Route::resource('content_videos', ContentVideoController::class, ['as' => 'admin'])->except(['show']);

    //Change Password
    Route::get('change_password', [AuthController::class, 'changePassword'])->name('admin.change_password');
    Route::post('update_password', [AuthController::class, 'updatePassword'])->name('admin.update_password');
});
