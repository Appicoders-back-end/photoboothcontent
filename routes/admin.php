<?php

use App\Http\Controllers\Admin\PromoCodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;

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

    Route::get('users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::post('storeSettings', [AdminController::class, 'storeSettings'])->name('admin.storeSettings');

    // promo codes start

    Route::get('index', [PromoCodeController::class, 'index'])->name('admin.promo.index');
    Route::get('create', [PromoCodeController::class, 'create'])->name('admin.promo.create');
    Route::post('store', [PromoCodeController::class, 'store'])->name('admin.promo.store');
    Route::get('destroy/{id}', [PromoCodeController::class, 'destroy'])->name('admin.promo.destroy');
    Route::get('edit/{id}', [PromoCodeController::class, 'edit'])->name('admin.promo.edit');
    Route::post('update/{id}', [PromoCodeController::class, 'update'])->name('admin.promo.update');

    // promo code end

});
