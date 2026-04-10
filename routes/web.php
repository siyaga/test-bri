<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MsProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureLogin;

Route::get('/', function () {
    return view('welcome');
});

// Login module routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Protected Web Routes
Route::middleware([EnsureLogin::class])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('ms_product', MsProductController::class);
    Route::resource('users', UserController::class);
});
