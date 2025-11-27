<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\KandidatProfil;

class ProfilController extends Controller
{
    // 1. TAMPILKAN FORM PROFIL
    public function index()
    {
        $user = Auth::user();
        
        // Ambil data profil jika sudah ada, jika belum null
        $profil = $user->kandidatProfil; 

        return view('kandidat.profil', compact('user', 'profil'));
    }

    // 2. SIMPAN / UPDATE PROFIL
    public function update(Request $request)
    {
        $user = Auth::user();
        $profil = $user->kandidatProfil; // Bisa null jika belum pernah isi

        // Validasi
        $request->validate([
            'name' => 'required|string|max:255', // Update nama di tabel users
            'no_ktp' => [
                'required', 
                'numeric', 
                'digits:16', 
                // Cek unik di tabel kandidat_profil, kecuali punya sendiri
                Rule::unique('kandidat_profil', 'no_ktp')->ignore($profil ? $profil->id : null)
            ],
            'no_telp' => 'required|numeric|digits_between:10,15',
            'tgl_lahir' => 'required|date',
            'alamat_domisili' => 'required|string|max:500',
        ], [
            'no_ktp.unique' => 'NIK ini sudah terdaftar di akun lain.',
            'no_ktp.digits' => 'NIK harus 16 digit.',
        ]);

        // 1. Update Nama di Tabel Users (Akun)
        $user->update([
            'name' => $request->name
        ]);

        // 2. Update atau Buat Baru di Tabel KandidatProfil
        // updateOrCreate: Cek apakah user_id ini sudah punya profil?
        // Kalau ada -> Update. Kalau belum -> Create.
        KandidatProfil::updateOrCreate(
            ['user_id' => $user->id], // Kunci pencarian
            [
                'nama_lengkap' => $request->name, // Sinkronkan nama lengkap
                'no_ktp' => $request->no_ktp,
                'no_telp' => $request->no_telp,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat_domisili' => $request->alamat_domisili,
            ]
        );

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
    }
}