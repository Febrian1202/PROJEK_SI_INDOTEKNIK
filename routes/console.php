<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// jalankan setiap hari jam 00:00
Schedule::call(function(){
    // Hapus user yang:
    // 1. email_verified_at-nya amsing kosong (null)
    // 2. DAN dibuatnya sudah lebih dari 24 jam yang lalu
    User::whereNull('email_verified_at')
    ->where('created_at', '<', now()->subHours(24))
    ->delete();
})->daily();
