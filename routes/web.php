<?php

use Illuminate\Support\Facades\Route;
// Import Controller yang akan dipakai
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\LamaranController; // <--- Tambahkan \Admin
use App\Http\Controllers\DirekturController;
use App\Http\Controllers\Admin\PosisiController;

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

// --- GROUP ROUTE ADMIN ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    // Nanti tambah route lain di sini:
    // Route::resource('lowongan', LowonganController::class);
    // Resource Route untuk CRUD Posisi (Otomatis buat route index, create, store, edit, update, destroy)
    Route::resource('posisi', PosisiController::class);

    // Route Manajemen Pelamar (Kita pakai 'only' karena tidak butuh create/store dari sisi admin)
    Route::resource('lamaran', LamaranController::class)->only(['index', 'show', 'update']);
});

// --- GROUP ROUTE DIREKTUR ---
Route::middleware(['auth'])->prefix('direktur')->name('direktur.')->group(function () {
    Route::get('/dashboard', [DirekturController::class, 'index'])->name('dashboard');
    // Nanti tambah route lain di sini:
    // Route::get('/laporan', [DirekturController::class, 'laporan']);
});