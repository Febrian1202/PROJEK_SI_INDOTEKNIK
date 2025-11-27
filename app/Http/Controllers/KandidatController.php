<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KandidatController extends Controller
{
    // 1. DASHBOARD UTAMA (Menu Grid)
    public function dashboard()
    {
        $user = Auth::user();
        
        // Statistik kecil untuk header dashboard
        $totalLamaran = Lamaran::where('kandidat_id', $user->kandidatProfil->id ?? 0)->count();
        $lamaranAktif = Lamaran::where('kandidat_id', $user->kandidatProfil->id ?? 0)
                        ->whereIn('status', ['Baru', 'Diproses'])->count();
        
        return view('kandidat.dashboard', compact('totalLamaran', 'lamaranAktif'));
    }

    // 2. HALAMAN PANDUAN (Cara Melamar)
    public function panduan()
    {
        return view('kandidat.panduan');
    }

    // 3. HALAMAN SYARAT & KETENTUAN
    public function syarat()
    {
        return view('kandidat.syarat');
    }

    // 4. DAFTAR LOWONGAN (Untuk Menu 'Lowongan Pekerjaan')
    public function lowongan()
    {
        // Ambil lowongan yang aktif saja
        $lowongan = Posisi::where('is_active', true)->latest()->paginate(9);
        return view('kandidat.lowongan.index', compact('lowongan'));
    }

    // 5. RIWAYAT LAMARAN
    public function riwayat()
    {
        $user = Auth::user();
        
        // Cek dulu apakah profil sudah diisi?
        if (!$user->kandidatProfil) {
            return redirect()->route('profil.index')->with('error', 'Lengkapi profil dulu sebelum melihat riwayat.');
        }

        $lamaran = Lamaran::with(['posisi'])
                    ->where('kandidat_id', $user->kandidatProfil->id)
                    ->latest()
                    ->paginate(10);

        return view('kandidat.riwayat', compact('lamaran'));
    }
}