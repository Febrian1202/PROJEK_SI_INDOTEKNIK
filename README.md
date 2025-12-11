# Sistem Informasi Rekrutmen - PT. Indoteknik Prima Mekongga

Aplikasi berbasis web untuk mengelola proses rekrutmen karyawan secara digital, mulai dari pendaftaran kandidat, seleksi berkas, persetujuan direksi, hingga penempatan karyawan di lokasi proyek (site).

Sistem ini dirancang untuk mempermudah HRD dalam mengelola data pelamar dan memberikan transparansi proses kepada Direktur dan Kandidat.

---

## 🚀 Fitur Unggulan

### 1. Multi-Role Authentication & Security
* **Tiga Hak Akses:** Admin (HRD), Direktur (Eksekutif), dan Kandidat (Pelamar).
* **Verifikasi Email (OTP):** Sistem keamanan pendaftaran menggunakan kode OTP 6-digit yang dikirim via email.
* **Fitur Lupa Password:** Reset password aman menggunakan token email.
* **Proteksi Route:** Middleware untuk membatasi akses antar role.

### 2. Fitur Admin (HRD)
* **Live Notification:** Notifikasi real-time (lonceng) saat ada pelamar baru tanpa refresh halaman.
* **Dashboard Statistik:** Memantau jumlah pelamar, lowongan aktif, dan status rekrutmen secara visual.
* **Manajemen Master Data:**
    * **Master Site:** Mengelola lokasi penempatan proyek (Site Pomalaa, Morosi, dll).
    * **Master Posisi:** Membuka lowongan pekerjaan baru dengan deskripsi dinamis.
    * **Master Dokumen:** Menambah jenis dokumen persyaratan.
* **Konfigurasi Lowongan:** Mengatur syarat dokumen (Wajib/Opsional) untuk setiap posisi secara spesifik.
* **Manajemen Pelamar:** Verifikasi berkas, ubah status lamaran, dan kirim pesan ke pelamar.
* **Kotak Masuk (Pesan):** Menerima dan mengelola pesan dari formulir kontak website.
* **Manajemen Karyawan:** Database karyawan aktif, penempatan site, dan status kontrak.

### 3. Fitur Direktur (Executive)
* **Executive Dashboard:** Ringkasan data strategis untuk pengambilan keputusan.
* **Approval System:** Workflow persetujuan kandidat yang telah lolos seleksi HRD.
* **Monitoring:** Melihat seluruh arus data pendaftar baru dan karyawan yang bergabung.
* **Laporan PDF:** Cetak laporan penerimaan karyawan otomatis berdasarkan filter periode bulan/tahun.

### 4. Fitur Kandidat (Pelamar)
* **Smart Register:** Pendaftaran akun mudah dengan validasi email.
* **Manajemen Profil:** Melengkapi biodata diri (NIK, Alamat, Foto) yang terintegrasi.
* **Pencarian Lowongan:** Fitur pencarian posisi pekerjaan berdasarkan kata kunci.
* **Dynamic Application Form:** Form upload berkas yang menyesuaikan dengan syarat posisi yang dilamar.
* **Cetak Kartu Peserta:** Generate otomatis Kartu Tanda Peserta (PDF) berisi foto dan barcode/nomor registrasi.
* **Tracking Status:** Memantau riwayat lamaran (Baru, Diproses, Diterima/Ditolak).

### 5. Fitur Umum (Public)
* **Landing Page Modern:** Informasi perusahaan, layanan, dan tim dengan desain responsif.
* **Halaman Detail Tim:** Profil lengkap jajaran direksi dan tim manajemen.
* **Formulir Kontak:** Fitur kirim pesan langsung ke Admin HRD.
* **Lokasi Peta:** Integrasi Google Maps pada halaman kontak.

---

## 🛠️ Teknologi

* **Backend:** [Laravel 11](https://laravel.com)
* **Frontend:** [Blade Templates](https://laravel.com/docs/blade) + [Tailwind CSS](https://tailwindcss.com)
* **Interactivity:** [Alpine.js](https://alpinejs.dev) (Live Notification, Mobile Menu, Modal)
* **Database:** MySQL
* **PDF Generator:** `barryvdh/laravel-dompdf` (Laporan & Kartu Peserta)
* **Icons:** Heroicons (SVG)

---

## 💻 Persyaratan Sistem (Prerequisites)

Pastikan komputer memiliki:
- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL/MariaDB
- Git

---

## ⚙️ Cara Instalasi (Local Development)

Ikuti langkah-langkah berikut:

### 1. Clone Repository
```Bash

git clone https://github.com/Febrian1202/PROJEK_SI_INDOTEKNIK.git
cd PROJEK_SI_INDOTEKNIK
```


### 2. Install Dependencies

Install paket PHP dan JavaScript yang dibutuhkan.

```Bash

composer install
npm install
```

### 3. Konfigurasi Environment

Duplikat file `.env.example` menjadi `.env` dan atur konfigurasi database.

```Bash

cp .env.example .env
php artisan key:generate
```

Ubah pengaturan database pada file `.env`:

```Cuplikan kode
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=

# Konfigurasi Mail (Wajib untuk fitur OTP)
# Gunakan Mailtrap.io untuk testing lokal
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=username_mailtrap_anda
MAIL_PASSWORD=password_mailtrap_anda
```

### 4. Setup Database & Seeding

Jalankan migrasi untuk membuat tabel dan masukkan data dummy (Admin, Site, Lowondan, dll).

```Bash
php artisan migrate:fresh --seed
```

### 5. Setup Storage Link

Penting agar file foto profil dan dokumen lamaran bisa diakses browser.


```Bash
php artisan storage:link

```

### 6. Jalankan Aplikasi

Buka dua terminal berbeda untuk menjalankan server PHP dan Build aset Frontend.

#### Terminal 1:

```Bash
php artisan serve
```

#### Terminal 2:

```Bash
npm run dev
```

Akses aplikasi di: `http://127.0.0.1:8000`

---

## 🔑 Akun Demo (Seeder)

Gunakan akun berikut untuk mencoba fitur setelah menjalankan seeder:

|      Role               |          Email                |  Password  |
| :----------------------:|-------------------------------|------------|
| __Admin HRD__           | `hrd@indoteknik.com`          | `password` |
| __Direktur__            | `direktur@indoteknik.com`     | `password` |
| __Kandidat (Contoh)__   | `budi@gmail.com`              | `password` |

<!-- ---

## 📝 Alur Kerja (Workflow)

1. **Admin:** Login -> Isi Master Data (Site, Dokumen) -> Buat Lowongan (Posisi).

2. **Kandidat:** Register -> Verifikasi OTP -> Lengkapi Profil -> Pilih Lowongan -> Upload Berkas.

3. **Admin:** Cek Pelamar -> Verifikasi Berkas -> Ubah status jadi 'Diproses'.

4. **Direktur:** Cek menu Approval -> Klik 'Setujui' pada kandidat terpilih.

5. **Admin:** Finalisasi -> Ubah status jadi 'Diterima' -> Pilih Penempatan Site.

6. **Selesai:** Data masuk ke tabel Karyawan & Laporan PDF siap dicetak. -->

---


## 👨‍💻 Tim Pengembang (Developer)

Sistem ini dikembangkan dan dikelola oleh:
* **M. Febrian Syah** - *Lead Developer / Mahasiswa*
* **Universitas SembilanBelasNovember Kolaka** - *Tugas Akhir / Kerja Praktik*

---

## 📄 Lisensi & Hak Cipta
Copyright © 2025 PT. Indoteknik Prima Mekongga.

Sistem ini adalah perangkat lunak properti (proprietary software) milik PT. Indoteknik Prima Mekongga. Dilarang menyalin, menyebarluaskan, atau menggunakan kode sumber ini tanpa izin tertulis dari perusahaan atau pengembang terkait.