<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posisi;
use App\Models\Lamaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        // 1. Hitung Total Pelamar (User dengan role kandidat)
        $totalPelamar = User::where('role', 'kandidat')->count();

        // 2. Hitung Lowongan Aktif
        $lowonganAktif = Posisi::where('is_active', true)->count();

        // 3. Hitung Lamaran yang statusnya 'Baru' (Perlu Review)
        $perluReview = Lamaran::where('status', 'Baru')->count(); // Pastikan enum di DB 'Baru', sesuaikan jika 'pending'

        // 4. Ambil 5 Pelamar Terbaru untuk Tabel
        $lamaranTerbaru = Lamaran::with(['kandidat', 'posisi']) // Eager load relasi biar ringan
            ->latest('created_at')
            ->take(5)
            ->get();

        return view('admin.dashboard', [
            'totalPelamar' => $totalPelamar,
            'lowonganAktif' => $lowonganAktif,
            'perluReview' => $perluReview,
            'lamaranTerbaru' => $lamaranTerbaru
        ]);
    }
}
