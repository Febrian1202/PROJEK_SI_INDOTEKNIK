# Sistem Informasi Rekrutmen - PT. Indoteknik Prima Mekongga

Aplikasi berbasis web untuk mengelola proses rekrutmen karyawan secara digital, mulai dari pendaftaran kandidat, seleksi berkas, persetujuan direksi, hingga penempatan karyawan di lokasi proyek (site).

Sistem ini dirancang untuk mempermudah HRD dalam mengelola data pelamar dan memberikan transparansi proses kepada Direktur dan Kandidat.

---

## 🚀 Fitur Utama

### 1. Role & Hak Akses (Multi-Auth)
Sistem membedakan akses untuk 3 jenis pengguna:
- **Admin (HRD):** Pengelola utama sistem.
- **Direktur:** Pengambil keputusan akhir (Approval) dan pemantau kinerja.
- **Kandidat (Pelamar):** Pengguna publik yang melamar pekerjaan.

### 2. Fitur Admin (Back Office)
- **Dashboard Statistik:** Ringkasan jumlah pelamar, lowongan aktif, dan status rekrutmen.
- **Manajemen Master Data:**
  - **Master Site:** Mengelola lokasi proyek (Site Pomalaa, Morosi, dll).
  - **Master Posisi:** Membuka lowongan pekerjaan baru.
  - **Master Dokumen:** Mengatur jenis dokumen persyaratan secara dinamis.
  - **Kelola User:** Manajemen akun pengguna.
- **Konfigurasi Lowongan:** Mengatur syarat dokumen wajib/opsional untuk setiap posisi.
- **Manajemen Pelamar:** Melihat detail pelamar, preview/download berkas PDF, ubah status (Terima/Tolak).
- **Manajemen Karyawan:** Mengelola database karyawan yang sudah diterima (Status kontrak, NIK, Penempatan).

### 3. Fitur Direktur (Executive)
- **Executive Dashboard:** Ringkasan data strategis.
- **Approval Workflow:** Menyetujui atau menolak kandidat yang telah lolos seleksi HRD.
- **Monitoring:** Melihat seluruh data pendaftar dan karyawan aktif.
- **Laporan PDF:** Mencetak laporan penerimaan karyawan berdasarkan periode bulan/tahun.

### 4. Fitur Kandidat (Frontend)
- **Autentikasi Aman:** Registrasi dengan verifikasi email (OTP via Mailtrap/SMTP).
- **Manajemen Profil:** Melengkapi biodata diri (NIK, Alamat, Foto).
- **Portal Lowongan:** Melihat daftar lowongan tersedia.
- **Sistem Melamar:** Upload berkas persyaratan dinamis sesuai posisi.
- **Tracking Status:** Melihat progres lamaran (Baru, Diproses, Diterima/Ditolak), bisa membatalkan lamaran.

---

## 🛠️ Teknologi yang Digunakan

- **Backend:** Laravel 11
- **Frontend:** Blade + Tailwind CSS
- **Interactivity:** Alpine.js
- **Database:** MySQL / MariaDB
- **PDF:** barryvdh/laravel-dompdf
- **Icons:** Heroicons

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

git clone https://github.com/username-anda/projek_si_indoteknik.git
cd projek_si_indoteknik
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

```Cuplikan Code
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

|      Role      |          Email                |  Password  |
| :-------------:|-------------------------------|------------|
| __Admin HRD__  | `hrd@indoteknik.com`          | `password` |
| __Direktur__   | `direktur@indoteknik.com`     | `password` |
| __Kandidat__   | _(Silahkan Register Sendiri)_ | -          |

---

## 📝 Alur Kerja (Workflow)

1. **Admin:** Login -> Isi Master Data (Site, Dokumen) -> Buat Lowongan (Posisi).

2. **Kandidat:** Register -> Verifikasi OTP -> Lengkapi Profil -> Pilih Lowongan -> Upload Berkas.

3. **Admin:** Cek Pelamar -> Verifikasi Berkas -> Ubah status jadi 'Diproses'.

4. **Direktur:** Cek menu Approval -> Klik 'Setujui' pada kandidat terpilih.

5. **Admin:** Finalisasi -> Ubah status jadi 'Diterima' -> Pilih Penempatan Site.

6. **Selesai:** Data masuk ke tabel Karyawan & Laporan PDF siap dicetak.

---


## 👨‍💻 Tim Pengembang (Developer)

Sistem ini dikembangkan dan dikelola oleh:
* **M. Febrian Syah** - *Lead Developer / Mahasiswa*
* **Universitas SembilanBelasNovember Kolaka** - *Tugas Akhir / Kerja Praktik*

---

## 📄 Lisensi

Hak Cipta © 2025 PT. Indoteknik Prima Mekongga.