<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Posisi;
use App\Models\Lamaran;
use App\Models\Karyawan;
use App\Models\MasterDokumen;
use App\Models\BerkasKandidat;
use App\Models\KandidatProfil;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Internal
        User::create([
            'name' => 'Admin HRD',
            'email' => 'hrd@indoteknik.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Bapak Direktur',
            'email' => 'direktur@indoteknik.com',
            'password' => Hash::make('password'),
            'role' => 'direktur',
        ]);

        // 2. BUAT DATA SITE TERLEBIH DAHULU (PENTING!)
        // Kita tidak pakai Factory agar datanya pasti ada dan namanya jelas.
        $sites = [
            ['nama_site' => 'Site Pomalaa', 'lokasi_fisik' => 'Kab. Kolaka'],
            ['nama_site' => 'Site Morosi', 'lokasi_fisik' => 'Kab. Konawe'],
            ['nama_site' => 'Site Mandiodo', 'lokasi_fisik' => 'Kab. Konawe Utara'],
            ['nama_site' => 'Head Office', 'lokasi_fisik' => 'Kota Kendari'],
        ];

        foreach ($sites as $site) {
            \App\Models\Site::create($site);
        }

        // 3. Buat Master Dokumen
        $dokumenList = [
            'KTP' => 'PDF',
            'Ijazah Terakhir' => 'PDF',
            'CV / Daftar Riwayat Hidup' => 'PDF',
            'SKCK' => 'PDF',
            'SIM B2 Umum' => 'PDF',
        ];

        $dokumenModels = [];
        foreach ($dokumenList as $nama => $tipe) {
            $dokumenModels[$nama] = MasterDokumen::create(['nama_dokumen' => $nama, 'tipe_file' => $tipe]);
        }

        // 4. Buat Posisi & Syaratnya
        $posisiDriver = Posisi::create([
            'nama_posisi' => 'Driver Dump Truck',
            'deskripsi' => 'Mengoperasikan unit dump truck.',
            'is_active' => true,
        ]);
        // Attach syarat (pastikan ID dokumen ada)
        $posisiDriver->syaratDokumen()->attach([
            $dokumenModels['KTP']->id => ['is_mandatory' => true],
            $dokumenModels['SIM B2 Umum']->id => ['is_mandatory' => true],
        ]);

        // 5. Buat Kandidat & Proses Lamaran
        // Kita buat 10 user kandidat
        $kandidats = User::factory(10)->create(['role' => 'kandidat']);

        foreach ($kandidats as $userKandidat) {
            // Buat Profil
            $profil = KandidatProfil::factory()->create(['user_id' => $userKandidat->id]);

            // Buat Lamaran (Otomatis status acak dari Factory)
            $lamaran = Lamaran::factory()->create([
                'kandidat_id' => $profil->id,
                'posisi_id' => $posisiDriver->id, // Contoh semua melamar driver
            ]);

            // Upload Berkas (Ceritanya upload KTP)
            BerkasKandidat::factory()->create([
                'lamaran_id' => $lamaran->id,
                'dokumen_id' => $dokumenModels['KTP']->id,
                'nama_file_asli' => 'ktp.pdf',
            ]);

            // 6. LOGIKA KARYAWAN (Bagian yang tadi Error)
            // Hanya buat karyawan jika status lamarannya 'Diterima'
            if ($lamaran->status === 'Diterima') {

                // Ambil satu site secara acak. 
                // Karena langkah no. 2 sudah dijalankan, maka first() TIDAK AKAN null.
                $site = \App\Models\Site::inRandomOrder()->first();

                Karyawan::factory()->create([
                    'kandidat_id' => $profil->id,
                    'lamaran_id' => $lamaran->id,
                    'site_id' => $site->id, // <-- Ini sekarang aman
                    // 'site_penempatan' => null, // Hapus baris ini jika kolomnya sudah dihapus di migrasi
                ]);
            }
        }
    }
}
