<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KandidatController extends Controller
{
    // DASHBOARD UTAMA (Menu Grid)
    public function dashboard()
    {
        $user = Auth::user();
        
        // Statistik kecil untuk header dashboard
        $totalLamaran = Lamaran::where('kandidat_id', $user->kandidatProfil->id ?? 0)->count();
        $lamaranAktif = Lamaran::where('kandidat_id', $user->kandidatProfil->id ?? 0)
                        ->whereIn('status', ['Baru', 'Diproses'])->count();
        
        return view('kandidat.dashboard', compact('totalLamaran', 'lamaranAktif'));
    }

    // HALAMAN PANDUAN (Cara Melamar)
    public function panduan()
    {
        return view('kandidat.panduan');
    }

    // HALAMAN SYARAT & KETENTUAN
    public function syarat()
    {
        return view('kandidat.syarat');
    }

    // DAFTAR LOWONGAN (Untuk Menu 'Lowongan Pekerjaan')
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

    // ... method lowongan() yang lama ...

    // 6. DETAIL LOWONGAN & FORM LAMAR
    public function showLowongan($id)
    {
        // Ambil posisi beserta syarat dokumennya
        $posisi = Posisi::with('syaratDokumen')->where('is_active', true)->findOrFail($id);
        
        // Cek apakah user sudah pernah melamar posisi ini?
        $user = Auth::user();
        $sudahLamar = Lamaran::where('kandidat_id', $user->kandidatProfil->id ?? 0)
                        ->where('posisi_id', $id)
                        ->exists();

        return view('kandidat.lowongan.show', compact('posisi', 'sudahLamar'));
    }

    // 7. PROSES LAMAR (UPLOAD BERKAS)
    public function storeLamaran(Request $request, $id)
    {
        $user = Auth::user();
        
        // 1. Validasi Profil
        if (!$user->kandidatProfil) {
            return redirect()->route('profil.index')->with('error', 'Lengkapi profil dulu sebelum melamar!');
        }

        $posisi = Posisi::with('syaratDokumen')->findOrFail($id);

        // 2. Validasi Input Dokumen Dinamis
        $rules = [];
        foreach ($posisi->syaratDokumen as $syarat) {
            if ($syarat->pivot->is_mandatory) {
                // Nama input form: berkas_IDDOKUMEN
                $rules['berkas_' . $syarat->id] = 'required|mimes:pdf,jpg,jpeg|max:2048';
            } else {
                $rules['berkas_' . $syarat->id] = 'nullable|mimes:pdf,jpg,jpeg|max:2048';
            }
        }
        $request->validate($rules, [
            'required' => 'Dokumen ini wajib diunggah.',
            'mimes' => 'Format harus PDF atau Gambar (JPG).',
            'max' => 'Ukuran maksimal 2MB.'
        ]);

        // 3. Simpan Data Lamaran Utama
        $lamaran = Lamaran::create([
            'kandidat_id' => $user->kandidatProfil->id,
            'posisi_id' => $posisi->id,
            'tgl_lamar' => now(),
            'status' => 'Baru',
        ]);

        // 4. Loop & Upload Setiap Berkas
        foreach ($posisi->syaratDokumen as $syarat) {
            $inputName = 'berkas_' . $syarat->id;
            
            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);
                
                // Simpan ke storage/app/public/uploads/lamaran/NIK_NAMA_POSISI
                $folderName = 'uploads/lamaran/' . $user->kandidatProfil->no_ktp;
                $fileName = time() . '_' . $syarat->nama_dokumen . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs($folderName, $fileName, 'public');

                // Simpan ke tabel berkas_kandidat
                \App\Models\BerkasKandidat::create([
                    'lamaran_id' => $lamaran->id,
                    'dokumen_id' => $syarat->id,
                    'nama_file_asli' => $file->getClientOriginalName(),
                    'path_file' => $path,
                    'tgl_upload' => now(),
                ]);
            }
        }

        return redirect()->route('kandidat.riwayat')->with('success', 'Lamaran berhasil dikirim! Pantau statusnya di sini.');
    }

    // 8. BATALKAN LAMARAN
    public function destroyLamaran($id)
    {
        $user = Auth::user();
        
        // Cari lamaran milik user ini
        $lamaran = Lamaran::where('kandidat_id', $user->kandidatProfil->id)
                          ->findOrFail($id);

        // Validasi: Hanya boleh batal jika status masih 'Baru'
        if ($lamaran->status !== 'Baru') {
            return back()->with('error', 'Lamaran yang sudah diproses tidak bisa dibatalkan.');
        }

        // 1. Hapus File Fisik di Storage
        foreach ($lamaran->berkas as $berkas) {
            if (Storage::disk('public')->exists($berkas->path_file)) {
                Storage::disk('public')->delete($berkas->path_file);
            }
            // Hapus record berkas di database (otomatis terhapus via cascade on delete, tapi manual lebih aman untuk file fisik)
        }

        // 2. Hapus Data Lamaran
        $lamaran->delete();

        return back()->with('success', 'Lamaran berhasil dibatalkan. Silakan melamar posisi lain.');
    }
}