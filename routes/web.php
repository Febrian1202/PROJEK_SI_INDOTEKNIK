<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
// Import Controller yang akan dipakai
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DirekturController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PosisiController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\LamaranController; // <--- Tambahkan \Admin

// Route Halaman Utama (Landing Page)
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('about', [AboutController::class,'about'])->name('about');

// Route Autentikasi (Guest Only)
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

// Route untuk Kandidat / User Umum
Route::middleware(['auth'])->group(function () {
    
    // Halaman Profil Saya
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');

    // Route Profil (Yang sudah dibuat sebelumnya)
    Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil', [App\Http\Controllers\ProfilController::class, 'update'])->name('profil.update');

    // INI YANG KURANG: Route Dashboard Kandidat
    Route::get('/kandidat/dashboard', [KandidatController::class, 'dashboard'])->name('kandidat.dashboard');

    // Route menu kandidat lainnya (yang tadi kita bahas)
    Route::get('/panduan-melamar', [KandidatController::class, 'panduan'])->name('kandidat.panduan');
    Route::get('/syarat-ketentuan', [KandidatController::class, 'syarat'])->name('kandidat.syarat');
    Route::get('/lowongan-kerja', [KandidatController::class, 'lowongan'])->name('kandidat.lowongan');
    Route::get('/riwayat-lamaran', [KandidatController::class, 'riwayat'])->name('kandidat.riwayat');

    // ... route kandidat lainnya ...
    Route::get('/lowongan-kerja', [KandidatController::class, 'lowongan'])->name('kandidat.lowongan');
    
    // Tambahkan 2 Route ini:
    Route::get('/lowongan-kerja/{id}', [KandidatController::class, 'showLowongan'])->name('kandidat.lowongan.show');
    Route::post('/lowongan-kerja/{id}/apply', [KandidatController::class, 'storeLamaran'])->name('kandidat.lowongan.store');

    // Route Batalkan Lamaran
    Route::delete('/riwayat-lamaran/{id}', [KandidatController::class, 'destroyLamaran'])->name('kandidat.lamaran.destroy');
});

// --- GROUP ROUTE ADMIN ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Resource Route untuk CRUD Posisi (Otomatis buat route index, create, store, edit, update, destroy)
    Route::resource('posisi', PosisiController::class);

    // Route Manajemen Pelamar (Kita pakai 'only' karena tidak butuh create/store dari sisi admin)
    Route::resource('lamaran', LamaranController::class)->only(['index', 'show', 'update']);
    
    // Route Manajemen User
    Route::resource('users', UserController::class);

    // Route Master Dokumen
    Route::resource('dokumen', DokumenController::class);

    // Route Master Site
    Route::resource('sites', SiteController::class);

    // Route Manajemen Karyawan
    Route::resource('karyawan', KaryawanController::class)->except(['create', 'store']);
});

// --- GROUP ROUTE DIREKTUR ---
Route::middleware(['auth'])->prefix('direktur')->name('direktur.')->group(function () {
    Route::get('/dashboard', [DirekturController::class, 'index'])->name('dashboard');
});