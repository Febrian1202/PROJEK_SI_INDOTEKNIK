<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Site;
use App\Models\Posisi;
use App\Models\MasterDokumen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun Internal (Admin & Direktur)
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

        // 2. Master Data Site (Lokasi Proyek Realistis)
        $sites = [
            ['nama_site' => 'Site Pomalaa', 'lokasi_fisik' => 'Kab. Kolaka, Sulawesi Tenggara'],
            ['nama_site' => 'Site Morosi', 'lokasi_fisik' => 'Kab. Konawe, Sulawesi Tenggara'],
            ['nama_site' => 'Site Mandiodo', 'lokasi_fisik' => 'Kab. Konawe Utara, Sulawesi Tenggara'],
            ['nama_site' => 'Head Office', 'lokasi_fisik' => 'Kota Kendari, Sulawesi Tenggara'],
        ];

        foreach ($sites as $siteData) {
            Site::create($siteData);
        }

        // 3. Master Data Dokumen (Bank Dokumen Lengkap)
        // Kita simpan objek modelnya ke array biar gampang dipanggil ID-nya nanti
        $docs = [];
        $dokumenList = [
            'ktp' => 'KTP',
            'kk' => 'Kartu Keluarga (KK)',
            'ijazah' => 'Ijazah Terakhir',
            'cv' => 'CV / Daftar Riwayat Hidup',
            'skck' => 'SKCK Aktif',
            'sim_a' => 'SIM A',
            'sim_b1' => 'SIM B1 Umum',
            'sim_b2' => 'SIM B2 Umum',
            'sio_exca' => 'SIO Excavator',
            'sio_loader' => 'SIO Wheel Loader',
            'sio_crane' => 'SIO Mobile Crane',
            'sertifikat_rigger' => 'Sertifikat Juru Ikat (Rigger)',
            'paklaring' => 'Surat Pengalaman Kerja (Paklaring)',
        ];

        foreach ($dokumenList as $key => $nama) {
            $docs[$key] = MasterDokumen::create(['nama_dokumen' => $nama, 'tipe_file' => 'PDF']);
        }

        // 4. DAFTAR LOWONGAN PEKERJAAN & SYARATNYA
        // Struktur: Nama Posisi, Deskripsi, Array Key Dokumen Wajib
        $daftarPosisi = [
            [
                'nama' => 'Tukang Kayu',
                'desk' => 'Bertanggung jawab atas pekerjaan kayu seperti pembuatan bekisting, pemasangan kusen, pintu, dan struktur kayu lainnya sesuai gambar kerja.',
                'syarat' => ['ktp', 'kk', 'ijazah', 'paklaring']
            ],
            [
                'nama' => 'Tukang Batu',
                'desk' => 'Melakukan pekerjaan pasangan bata, plesteran, acian, pemasangan keramik, dan pekerjaan beton sederhana.',
                'syarat' => ['ktp', 'kk', 'ijazah', 'paklaring']
            ],
            [
                'nama' => 'Tukang Besi',
                'desk' => 'Melakukan pemotongan, pembengkokan, dan perakitan besi beton (tulangan) sesuai spesifikasi konstruksi.',
                'syarat' => ['ktp', 'kk', 'ijazah', 'paklaring']
            ],
            [
                'nama' => 'Crew Umum',
                'desk' => 'Membantu tukang atau operator dalam pekerjaan sehari-hari, menyiapkan material, dan menjaga kebersihan area kerja.',
                'syarat' => ['ktp', 'kk', 'ijazah']
            ],
            [
                'nama' => 'Helper',
                'desk' => 'Memberikan dukungan operasional kepada mekanik atau operator alat berat di lapangan.',
                'syarat' => ['ktp', 'kk', 'ijazah']
            ],
            [
                'nama' => 'Driver Dump Truck (DT)',
                'desk' => 'Mengoperasikan unit Dump Truck 10 roda untuk pengangkutan material tambang (hauling) dengan aman.',
                'syarat' => ['ktp', 'sim_b2', 'skck', 'paklaring']
            ],
            [
                'nama' => 'Operator Excavator',
                'desk' => 'Mengoperasikan unit Excavator untuk kegiatan penggalian (digging), pemuatan (loading), dan perataan tanah.',
                'syarat' => ['ktp', 'sio_exca', 'skck', 'paklaring']
            ],
            [
                'nama' => 'Operator Loader',
                'desk' => 'Mengoperasikan Wheel Loader untuk memuat material ke dalam dump truck atau stockpile management.',
                'syarat' => ['ktp', 'sio_loader', 'skck', 'paklaring']
            ],
            [
                'nama' => 'Operator Crane',
                'desk' => 'Mengoperasikan Mobile Crane untuk pekerjaan pengangkatan (lifting) material berat di area konstruksi.',
                'syarat' => ['ktp', 'sio_crane', 'skck', 'paklaring']
            ],
            [
                'nama' => 'Fuel Man',
                'desk' => 'Melakukan pengisian bahan bakar solar ke unit alat berat dan mencatat pemakaian harian secara akurat.',
                'syarat' => ['ktp', 'ijazah', 'cv', 'skck']
            ],
            [
                'nama' => 'Rigger',
                'desk' => 'Melakukan pengikatan beban (rigging) dan memberikan aba-aba (signal) kepada operator crane saat lifting.',
                'syarat' => ['ktp', 'sertifikat_rigger', 'skck', 'paklaring']
            ],
        ];

        // Loop pembuatan Posisi
        foreach ($daftarPosisi as $data) {
            // A. Simpan Posisi
            $posisi = Posisi::create([
                'nama_posisi' => $data['nama'],
                'deskripsi' => $data['desk'],
                'is_active' => true,
            ]);

            // B. Cari ID Dokumen dan Attach ke Posisi
            $syaratIds = [];
            foreach ($data['syarat'] as $keyDoc) {
                if (isset($docs[$keyDoc])) {
                    // Semua syarat di-set Wajib (is_mandatory = true)
                    $syaratIds[$docs[$keyDoc]->id] = ['is_mandatory' => true];
                }
            }
            $posisi->syaratDokumen()->attach($syaratIds);
        }

        // 5. User Kandidat Dummy (Untuk Testing Login)
        User::factory()->create([
            'name' => 'Budi Santoso',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'kandidat',
        ]);
    }
}