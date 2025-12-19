<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Posisi;
use App\Models\Lamaran;
use App\Models\User;
use App\Notifications\LamaranMasukNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KandidatController extends Controller
{
    // =========================================================================
    // HELPER: Cek Kelengkapan Profil (Private biar gak bisa diakses dari URL)
    // =========================================================================
    private function cekProfilLengkap($user)
    {
        // Cek 1: Apakah data profil sudah dibuat di database?
        if (!$user->kandidatProfil) {
            return false;
        }

        // Cek 2: Apakah field-field krusial sudah diisi?
        // Sesuaikan 'no_ktp' dengan nama kolom NIK di tabel abang
        if (
            empty($user->kandidatProfil->no_ktp) || 
            empty($user->kandidatProfil->no_telp) || 
            empty($user->kandidatProfil->alamat) || 
            empty($user->kandidatProfil->foto)
        ) {
            return false;
        }

        return true;
    }

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
    public function lowongan(Request $request)
    {
        // --- VALIDASI PROFIL ---
        // User dipaksa melengkapi profil dulu sebelum bisa lihat lowongan
        if (!$this->cekProfilLengkap(Auth::user())) {
            return redirect()->route('profil.index')->with('error', 'Mohon lengkapi Biodata (NIK, No HP, Alamat, Foto) sebelum melihat lowongan!');
        }
        // -----------------------

        // Mulai Query dasar (Hanya tampilkan yang aktif)
        $query = Posisi::where('is_active', true);

        // Cek apakah ada input 'keyword' dari pencarian
        if ($request->has('keyword') && $request->keyword != '') {
            $keyword = $request->keyword;
            
            // Lakukan filter (WHERE nama_posisi LIKE %keyword%)
            $query->where(function($q) use ($keyword) {
                $q->where('nama_posisi', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('deskripsi', 'LIKE', '%' . $keyword . '%'); // Opsional: cari di deskripsi juga
            });
        }

        // Ambil data dengan Pagination
        $lowongan = $query->latest()->paginate(9);
        $lowongan->appends(['keyword' => $request->keyword]);

        return view('kandidat.lowongan.index', compact('lowongan'));
    }

    // RIWAYAT LAMARAN
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


    // DETAIL LOWONGAN & FORM LAMAR
    public function showLowongan($id)
    {
        // --- VALIDASI PROFIL ---
        if (!$this->cekProfilLengkap(Auth::user())) {
            return redirect()->route('profil.index')->with('error', 'Mohon lengkapi Biodata (NIK, No HP, Alamat, Foto) sebelum melihat detail lowongan!');
        }
        // -----------------------

        // Ambil posisi beserta syarat dokumennya
        $posisi = Posisi::with('syaratDokumen')->where('is_active', true)->findOrFail($id);

        // Cek apakah user sudah pernah melamar posisi ini?
        $user = Auth::user();
        $sudahLamar = Lamaran::where('kandidat_id', $user->kandidatProfil->id ?? 0)
            ->where('posisi_id', $id)
            ->exists();

        return view('kandidat.lowongan.show', compact('posisi', 'sudahLamar'));
    }

    // PROSES LAMAR (UPLOAD BERKAS)
    public function storeLamaran(Request $request, $id)
    {
        $user = Auth::user();

        // --- VALIDASI PROFIL ---
        // Double check saat submit, biar user gak nakal nembak URL
        if (!$this->cekProfilLengkap($user)) {
            return redirect()->route('profil.index')->with('error', 'Lengkapi profil (NIK & Foto) dulu sebelum melamar!');
        }
        // -----------------------

        $posisi = Posisi::with('syaratDokumen')->findOrFail($id);

        // Validasi Input Dokumen Dinamis
        $rules = [];
        foreach ($posisi->syaratDokumen as $syarat) {
            if ($syarat->pivot->is_mandatory) {
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

        // Simpan Data Lamaran Utama
        $lamaran = Lamaran::create([
            'kandidat_id' => $user->kandidatProfil->id,
            'posisi_id' => $posisi->id,
            'tgl_lamar' => now(),
            'status' => 'Baru',
        ]);

        // Loop & Upload Setiap Berkas
        foreach ($posisi->syaratDokumen as $syarat) {
            $inputName = 'berkas_' . $syarat->id;

            if ($request->hasFile($inputName)) {
                $file = $request->file($inputName);

                // Bersihkan Nama Folder (NIK)
                $nikFolder = trim($user->kandidatProfil->no_ktp);
                $targetFolder = 'uploads/lamaran/' . $nikFolder;

                if (!Storage::disk('public')->exists($targetFolder)) {
                    Storage::disk('public')->makeDirectory($targetFolder);
                }

                $cleanDocName = Str::slug($syarat->nama_dokumen);
                $ext = strtolower($file->getClientOriginalExtension());
                if (empty($ext)) $ext = 'pdf'; 

                $fileName = time() . '_' . $cleanDocName . '.' . $ext;
                $path = Storage::disk('public')->putFileAs($targetFolder, $file, $fileName);

                \App\Models\BerkasKandidat::create([
                    'lamaran_id' => $lamaran->id,
                    'dokumen_id' => $syarat->id,
                    'nama_file_asli' => $file->getClientOriginalName(),
                    'path_file' => $path,
                    'tgl_upload' => now(),
                ]);
            }
        }

        // KIRIM NOTIFIKASI KE SEMUA ADMIN
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new LamaranMasukNotification($lamaran));

        return redirect()->route('kandidat.riwayat')->with('success', 'Lamaran berhasil dikirim! Pantau statusnya di sini.');
    }

    // BATALKAN LAMARAN
    public function destroyLamaran($id)
    {
        $user = Auth::user();

        // Cari lamaran milik user ini
        $lamaran = Lamaran::where('kandidat_id', $user->kandidatProfil->id)
            ->findOrFail($id);

        if ($lamaran->status !== 'Baru') {
            return back()->with('error', 'Lamaran yang sudah diproses tidak bisa dibatalkan.');
        }

        foreach ($lamaran->berkas as $berkas) {
            if (Storage::disk('public')->exists($berkas->path_file)) {
                Storage::disk('public')->delete($berkas->path_file);
            }
        }

        $lamaran->delete();

        return back()->with('success', 'Lamaran berhasil dibatalkan. Silakan melamar posisi lain.');
    }
}