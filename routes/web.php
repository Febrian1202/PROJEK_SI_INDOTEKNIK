<?php

use Illuminate\Support\Facades\Route;
// Import Controller yang akan dipakai
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// 1. Route Halaman Utama (Landing Page)
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. Route Autentikasi (Guest Only)
// Grup ini agar rapi & mudah dikelola
Route::controller(AuthController::class)->group(function () {
    
    // Halaman Login
    Route::get('/login', 'showLogin')->name('login');
    // Proses Login (POST)
    Route::post('/login', 'processLogin')->name('login.process');

    // Halaman Register
    Route::get('/register', 'showRegister')->name('register');
    // Proses Register (POST)
    Route::post('/register', 'processRegister')->name('register.process');

    // Logout (Tambahkan ini)
    Route::post('/logout', 'logout')->name('logout');
    
});

// Halaman Dashboard Admin
Route::get('/admin/dashboard', function () {
    return "<h1>Halo Admin! Ini Halaman Dashboard Anda.</h1>";
})->middleware(['auth'])->name('admin.dashboard');

// Halaman Dashboard Direktur
Route::get('/direktur/dashboard', function () {
    return "<h1>Selamat Datang Pak Direktur.</h1>";
})->middleware(['auth'])->name('direktur.dashboard');