<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use App\Models\Lamaran;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LamaranController extends Controller
{
    // 1. DAFTAR PELAMAR
    public function index(Request $request)
    {
        // Query dasar dengan relasi
        $query = Lamaran::with(['kandidat', 'posisi']);

        // Filter berdasarkan Status (jika ada request filter)
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Ambil data terbaru
        $lamaran = $query->latest()->paginate(10);

        return view('admin.lamaran.index', compact('lamaran'));
    }

    // 2. DETAIL PELAMAR (Lihat Berkas & Profil)
    public function show($id)
    {
        // Ambil lamaran beserta berkas dan jenis dokumennya
        $lamaran = Lamaran::with(['kandidat', 'posisi', 'berkas.jenisDokumen'])->findOrFail($id);
        
        // Kita butuh daftar Site untuk dropdown jika admin mau menerima pelamar
        $sites = Site::all();

        return view('admin.lamaran.show', compact('lamaran', 'sites'));
    }

    // 3. PROSES UPDATE STATUS (Terima/Tolak)
    public function update(Request $request, $id)
    {
        $lamaran = Lamaran::findOrFail($id);

        // Validasi input
        $request->validate([
            'status' => 'required|in:Diproses,Diterima,Ditolak',
            'catatan_hr' => 'nullable|string',
            // Jika status diterima, site_id wajib diisi
            'site_id' => 'required_if:status,Diterima',
        ]);

        DB::transaction(function () use ($request, $lamaran) {
            // 1. Update Status Lamaran
            $lamaran->update([
                'status' => $request->status,
                'catatan_hr' => $request->catatan_hr,
            ]);

            // 2. Logika Jika DITERIMA -> Masuk ke Tabel Karyawan
            if ($request->status == 'Diterima') {
                
                // Cek apakah sudah ada di tabel karyawan (biar ga duplikat)
                $existing = Karyawan::where('lamaran_id', $lamaran->id)->first();

                if (!$existing) {
                    Karyawan::create([
                        'kandidat_id' => $lamaran->kandidat_id,
                        'lamaran_id' => $lamaran->id,
                        'site_id' => $request->site_id,
                        // Generate NIK Sederhana: TAHUN-BULAN-IDLAMARAN
                        'nik_karyawan' => 'EMP-' . date('Ym') . '-' . str_pad($lamaran->id, 4, '0', STR_PAD_LEFT),
                        'tgl_bergabung' => now(),
                        'status_karyawan' => 'Kontrak', // Default dulu
                    ]);
                    
                    // Opsional: Ubah role user dari 'kandidat' jadi 'karyawan' (jika ada role itu)
                    // $lamaran->kandidat->user->update(['role' => 'karyawan']);
                }
            }
        });

        return redirect()->route('admin.lamaran.show', $lamaran->id)->with('success', 'Status pelamar berhasil diperbarui!');
    }
}