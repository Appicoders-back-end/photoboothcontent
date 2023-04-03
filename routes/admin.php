<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;

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

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
