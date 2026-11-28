<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

// Login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Halaman yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard: Admin dan Kasir
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Khusus Admin
    Route::middleware('role:admin')->group(function () {

        // CRUD Kategori
        Route::resource('categories', CategoryController::class);

        // CRUD Produk
        Route::resource('products', ProductController::class);

    });

});