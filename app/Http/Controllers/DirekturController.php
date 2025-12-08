<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Posisi;
use App\Models\Lamaran;
use App\Models\Karyawan;
use Carbon\Carbon;

class DirekturController extends Controller
{
    //
    public function index()
    {
        // 1. STATISTIK KARYAWAN BARU (Bulan Ini)
        $karyawanBaru = Karyawan::whereMonth('tgl_bergabung', Carbon::now()->month)
                        ->whereYear('tgl_bergabung', Carbon::now()->year)
                        ->count();

        // Bandingkan dengan bulan lalu untuk teks "+2 dari bulan lalu"
        $karyawanBulanLalu = Karyawan::whereMonth('tgl_bergabung', Carbon::now()->subMonth()->month)->count();
        $diff = $karyawanBaru - $karyawanBulanLalu;
        $trendText = $diff >= 0 ? "+$diff dari bulan lalu" : "$diff dari bulan lalu";

        // 2. MENUNGGU PERSETUJUAN (Status = 'Diproses')
        // Asumsi: Admin mengubah status jadi 'Diproses' (Interview/Review),
        // lalu Direktur yang mengubah jadi 'Diterima' atau 'Ditolak'.
        $menungguApproval = Lamaran::where('status', 'Diproses')->count();

        // 3. TOTAL PELAMAR
        $totalPelamar = User::where('role', 'kandidat')->count();

        // 4. POSISI TERBUKA
        $posisiTerbuka = Posisi::where('is_active', true)->count();

        // 5. TABEL APPROVAL (Ambil data yang statusnya 'Diproses')
        $listApproval = Lamaran::with(['kandidat', 'posisi'])
                        ->where('status', 'Diproses')
                        ->latest()
                        ->get();

        return view('direktur.dashboard', compact(
            'karyawanBaru', 'trendText', 
            'menungguApproval', 'totalPelamar', 'posisiTerbuka',
            'listApproval'
        ));
    }

    // METHOD BARU: PROSES APPROVAL OLEH DIREKTUR
    public function approve(Request $request, $id)
    {
        $lamaran = Lamaran::findOrFail($id);
        
        $request->validate([
            'action' => 'required|in:terima,tolak'
        ]);

        if ($request->action == 'terima') {
            // Jika diterima, arahkan ke halaman detail admin (atau buat halaman khusus penempatan site)
            // Karena untuk menerima butuh INPUT SITE, kita tidak bisa langsung update di sini.
            // OPSI: Kita arahkan Direktur ke halaman detail yang sama dengan Admin untuk isi site.
            return redirect()->route('admin.lamaran.show', $id);
        } else {
            // Jika tolak, langsung update
            $lamaran->update([
                'status' => 'Ditolak',
                'catatan_hr' => 'Keputusan Direktur: Tidak Lolos Kualifikasi.'
            ]);
            return back()->with('success', 'Kandidat telah ditolak.');
        }
    }

    // Halaman Persetujuan (list pelamar yang statusnya 'Diproses')
    public function approval()
    {
        $lamaran = Lamaran::with(['kandidat', 'posisi'])
                    ->where('status', 'Diproses')
                    ->latest()
                    ->paginate(10);

        return view('direktur.approval', compact('lamaran'));
    }

    // Halanan Laporan Kinerja (Rekap Data)
    public function laporan(Request $request)
    {
        // Filter bulan & Tahun (Default bulan ini)
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));

        // Data 1: Karyawan diterima bulan ini
        $karyawanBaru = Karyawan::whereMonth('tgl_bergabung', $bulan)
                        ->whereYear('tgl_bergabung', $tahun)
                        ->count();

        // data 2: total pelamar masuk
        $pelamarMasuk = Lamaran::whereMonth('created_at', $bulan)
                        ->whereYear('created_at', $tahun)
                        ->count();

        // data 3: pelamar ditolah
        $pelamarDitolak = Lamaran::whereMonth('updated_at', $bulan)
                        ->whereYear('updated_at', $tahun)
                        ->where('status', 'Ditolak')
                        ->count();

        // data 4: list karyawan baru (untuk tabel detail)
        $listKaryawan = Karyawan::with(['kandidat','site', 'lamaran.posisi'])
                        ->whereMonth('tgl_bergabung', $bulan)
                        ->whereYear('tgl_bergabung', $tahun)
                        ->get();

        return view('direktur.laporan', compact(
            'karyawanBaru', 'pelamarMasuk', 'pelamarDitolak','listKaryawan','bulan','tahun'
        ));
    }
}
