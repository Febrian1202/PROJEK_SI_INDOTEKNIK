<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Posisi;
use App\Models\Lamaran;
use App\Models\Karyawan;
use App\Models\KandidatProfil;
use App\Models\MasterDokumen;
use App\Models\BerkasKandidat;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // --- TAMBAHAN: SEEDING SITES ---
        // Kita buat data site yang fix (bukan random) agar sesuai kenyataan
        $sites = [
            ['nama_site' => 'Site Pomalaa', 'lokasi_fisik' => 'Kab. Kolaka'],
            ['nama_site' => 'Site Morosi', 'lokasi_fisik' => 'Kab. Konawe'],
            ['nama_site' => 'Site Mandiodo', 'lokasi_fisik' => 'Kab. Konawe Utara'],
            ['nama_site' => 'Head Office', 'lokasi_fisik' => 'Kota Kendari'],
        ];
        
        // 1. Buat Akun Internal (Admin & Direktur)
        User::factory()->create([
            'name' => 'Admin HRD',
            'email' => 'hrd@indoteknik.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Bapak Direktur',
            'email' => 'direktur@indoteknik.com',
            'password' => bcrypt('password'),
            'role' => 'direktur',
        ]);

        // 2. Buat Master Dokumen (Syarat-syarat umum)
        $dokumenList = ['KTP', 'Ijazah Terakhir', 'Transkrip Nilai', 'CV / Daftar Riwayat Hidup', 'SKCK', 'SIM A', 'SIM B1', 'Sertifikat K3 Umum'];
        $dokumenModels = [];
        foreach ($dokumenList as $docName) {
            $dokumenModels[$docName] = MasterDokumen::factory()->create(['nama_dokumen' => $docName]);
        }

        // 3. Buat Data Lowongan (Posisi)
        $posisi1 = Posisi::factory()->create([
            'nama_posisi' => 'Site Manager',
            'deskripsi' => 'Bertanggung jawab atas operasional harian di lokasi proyek pertambangan.',
        ]);
        // Syarat Site Manager: Ijazah, CV, Sertifikat K3
        $posisi1->syaratDokumen()->attach([
            $dokumenModels['Ijazah Terakhir']->id,
            $dokumenModels['CV / Daftar Riwayat Hidup']->id,
            $dokumenModels['Sertifikat K3 Umum']->id
        ], ['is_mandatory' => true]);


        $posisi2 = Posisi::factory()->create([
            'nama_posisi' => 'Driver Dump Truck',
            'deskripsi' => 'Mengoperasikan unit dump truck 10 roda di area tambang.',
        ]);
        // Syarat Driver: KTP, SIM B1, SKCK
        $posisi2->syaratDokumen()->attach([
            $dokumenModels['KTP']->id,
            $dokumenModels['SIM B1']->id,
            $dokumenModels['SKCK']->id
        ], ['is_mandatory' => true]);


        $posisi3 = Posisi::factory()->create([
            'nama_posisi' => 'Staff Administrasi',
            'deskripsi' => 'Mengurus pembukuan dan surat jalan operasional.',
        ]);
        
        // 4. Buat 10 Kandidat (Pelamar) Dummy
        $kandidats = User::factory(10)->create(['role' => 'kandidat']);

        foreach ($kandidats as $userKandidat) {
            // Buat Profil untuk setiap user kandidat
            $profil = KandidatProfil::factory()->create(['user_id' => $userKandidat->id]);

            // 5. Skenario: Kandidat melamar pekerjaan
            // Ambil posisi acak
            $posisiTarget = fake()->randomElement([$posisi1, $posisi2, $posisi3]);
            
            $lamaran = Lamaran::factory()->create([
                'kandidat_id' => $profil->id,
                'posisi_id' => $posisiTarget->id,
                'status' => fake()->randomElement(['Baru', 'Diproses', 'Diterima', 'Ditolak']),
            ]);

            // 6. Upload Berkas Dummy untuk lamaran tersebut
            // (Misal dia upload KTP)
            BerkasKandidat::factory()->create([
                'lamaran_id' => $lamaran->id,
                'dokumen_id' => $dokumenModels['KTP']->id,
                'nama_file_asli' => 'scan_ktp.pdf',
                'path_file' => 'uploads/dummy/scan_ktp.pdf'
            ]);

            // 7. Skenario: Jika status Diterima, jadikan Karyawan
            if ($lamaran->status === 'Diterima') {
                Karyawan::factory()->create([
                    'kandidat_id' => $profil->id,
                    'lamaran_id' => $lamaran->id,
                    'site_id' => \App\Models\Site::inRandomOrder()->first()->id, // <--- PILIH SITE ACAK
                ]);
            }
        }
    }
}