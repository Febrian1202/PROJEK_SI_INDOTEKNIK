<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// Import Controller yang akan dipakai
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DirekturController;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PosisiController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\Admin\LamaranController; // <--- Tambahkan \Admin
use App\Http\Controllers\ContactController;

// Route Halaman Utama (Landing Page)
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('about', [AboutController::class,'about'])->name('about');

Route::get('service', [ServiceController::class,'service'])->name('service');

Route::get('contact', [ContactController::class,'contact'])->name('contact');

// Route Halaman Detail Tim (Hardcode)
Route::get('/team/detail-dir', function () {
    return view('/team/detail-dir');
})->name('team.detail-dir');
Route::get('/team/detail-hr', function () {
    return view('/team/detail-hr');
})->name('team.detail-hr');
Route::get('/team/detail-hse', function () {
    return view('/team/detail-hse');
})->name('team.detail-hse');
Route::get('/team/detail-qc', function () {
    return view('/team/detail-qc');
})->name('team.detail-qc');
Route::get('/team/detail-prod', function () {
    return view('/team/detail-prod');
})->name('team.detail-prod');
Route::get('/team/detail-civ', function () {
    return view('/team/detail-civ');
})->name('team.detail-civ');

// Route untuk kirim pesan kontak
Route::post('/kirim-pesan', [PesanController::class, 'store'])->name('pesan.store');


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

    // ROUTE BARU: OTP
    Route::get('/verify-otp', 'showVerification')->name('verification.notice');
    Route::post('/verify-otp', 'verifyOtp')->name('verification.verify');
    Route::post('/resend-otp', 'resendOtp')->name('verification.resend');
    
    // LUPA PASSWORD
    Route::get('/forgot-password', 'showForgotPassword')->name('password.request');
    Route::post('/forgot-password', 'sendResetLink')->name('password.email');

    // RESET PASSWORD
    Route::get('/reset-password/{token}', 'showResetPassword')->name('password.reset');
    Route::post('/reset-password', 'updatePassword')->name('password.update');
});

// Route untuk Kandidat / User Umum
Route::middleware(['auth'])->group(function () {
    
    // Halaman Profil Saya
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');

    // Route Profil (Yang sudah dibuat sebelumnya)
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil', [ProfilController::class, 'update'])->name('profil.update');

    // INI YANG KURANG: Route Dashboard Kandidat
    Route::get('/kandidat/dashboard', [KandidatController::class, 'dashboard'])->name('kandidat.dashboard');

    // Route menu kandidat lainnya (yang tadi kita bahas)
    Route::get('/panduan-melamar', [KandidatController::class, 'panduan'])->name('kandidat.panduan');
    Route::get('/syarat-ketentuan', [KandidatController::class, 'syarat'])->name('kandidat.syarat');
    Route::get('/lowongan-kerja', [KandidatController::class, 'lowongan'])->name('kandidat.lowongan');
    Route::get('/riwayat-lamaran', [KandidatController::class, 'riwayat'])->name('kandidat.riwayat');

    // ... route kandidat lainnya ...
    Route::get('/lowongan-kerja', [KandidatController::class, 'lowongan'])->name('kandidat.lowongan');
    
    // 
    Route::get('/lowongan-kerja/{id}', [KandidatController::class, 'showLowongan'])->name('kandidat.lowongan.show');
    Route::post('/lowongan-kerja/{id}/apply', [KandidatController::class, 'storeLamaran'])->name('kandidat.lowongan.store');

    // Route Batalkan Lamaran
    Route::delete('/riwayat-lamaran/{id}', [KandidatController::class, 'destroyLamaran'])->name('kandidat.lamaran.destroy');

    // ROUTE CETAK KARTU
    Route::get('/profil/cetak-kartu', [ProfilController::class, 'cetakKartu'])->name('profil.cetak');
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

    // Route API Notifikasi
    Route::get('/notifications/get', [AdminController::class, 'getNotifications'])->name('notifications.get');
    Route::post('/notifications/read', [AdminController::class, 'markAsRead'])->name('notifications.read');

    // [BARU] ROUTE PESAN MASUK
    Route::get('/pesan-masuk', [PesanController::class, 'index'])->name('pesan.index');
    Route::delete('/pesan-masuk/{id}', [PesanController::class, 'destroy'])->name('pesan.destroy');
});

// --- GROUP ROUTE DIREKTUR ---
Route::middleware(['auth'])->prefix('direktur')->name('direktur.')->group(function () {
    // Dashboard Utama
    Route::get('/dashboard', [DirekturController::class, 'index'])->name('dashboard');
    
    // Route untuk Action (Terima/Tolak)
    Route::post('/approval/{id}', [DirekturController::class, 'approve'])->name('approval.action');

    // Halaman list approval
    Route::get('/approval', [DirekturController::class, 'approval'])->name('approval.index');

    // Halaman Laporan
    Route::get('/laporan', [DirekturController::class, 'laporan'])->name('laporan.index');
    
    // [BARU] Route Cetak PDF
    Route::get('/laporan/cetak', [DirekturController::class, 'cetakPdf'])->name('laporan.cetak');

    // Monitoring
    Route::get('/data-pelamar', [DirekturController::class, 'dataPelamar'])->name('pelamar.index');
    Route::get('/data-karyawan', [DirekturController::class, 'dataKaryawan'])->name('karyawan.index');
});