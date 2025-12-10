<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posisi;
use App\Models\Lamaran;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        // ... (kode statistik yang lama biarkan saja) ...
        $totalPelamar = User::where('role', 'kandidat')->count();
        $lowonganAktif = Posisi::where('is_active', true)->count();
        $perluReview = Lamaran::where('status', 'Baru')->count();
        $lamaranTerbaru = Lamaran::with(['kandidat', 'posisi'])->latest('created_at')->take(5)->get();

        // --- DATA TAMBAHAN UNTUK TABEL DASHBOARD ---
        
        // 1. Site Terbaru (Ambil 5 terakhir)
        $siteTerbaru = \App\Models\Site::withCount('karyawan')
                        ->latest()
                        ->take(5)
                        ->get();

        // 2. Lowongan Aktif Terbaru (Ambil 5 terakhir)
        $posisiTerbaru = Posisi::withCount('lamaran') // Hitung berapa yang melamar di posisi ini
                        ->where('is_active', true)
                        ->latest()
                        ->take(5)
                        ->get();

        // 3. Karyawan Baru Bergabung (Ambil 5 terakhir)
        $karyawanBaru = Karyawan::with(['kandidat', 'site'])
                        ->latest('tgl_bergabung')
                        ->take(5)
                        ->get();

        return view('admin.dashboard', compact(
            'totalPelamar', 'lowonganAktif', 'perluReview', 'lamaranTerbaru',
            'siteTerbaru', 'posisiTerbaru', 'karyawanBaru' // <-- Kirim variabel baru
        ));
    }

    // Method Cek Notifikasi (via alphine)
    public function getNotifications()
    {
            try {
            $user = auth()->user();
            
            // Ambil notifikasi yang belum dibaca
            $unreadNotifications = $user->unreadNotifications;

            // Format ulang data agar aman dikirim ke JSON
            $formattedNotifications = $unreadNotifications->take(5)->map(function ($notif) {
                return [
                    'id' => $notif->id,
                    // Akses data array di dalam kolom 'data'
                    'data' => [
                        'lamaran_id' => $notif->data['lamaran_id'] ?? 0,
                        'nama_pelamar' => $notif->data['nama_pelamar'] ?? 'Tanpa Nama',
                        'posisi' => $notif->data['posisi'] ?? '-',
                    ],
                    'read_at' => $notif->read_at,
                    'created_at' => $notif->created_at->diffForHumans(), // Format waktu "2 menit lalu"
                ];
            })->values(); // Reset array keys

            return response()->json([
                'count' => $unreadNotifications->count(),
                'notifications' => $formattedNotifications
            ]);

        } catch (\Exception $e) {
            // Log error biar ketahuan kalau ada masalah
            \Log::error('Notification Error: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal memuat notifikasi'], 500);
        }
    }

    // Method untuk tandai sudah dibaca
    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json(['success' => true ]);
    }
}
