<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\KandidatProfil;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    // TAMPILKAN FORM PROFIL
    public function index()
    {
        $user = Auth::user();
        
        // Ambil data profil jika sudah ada, jika belum null
        $profil = $user->kandidatProfil; 

        return view('kandidat.profil', compact('user', 'profil'));
    }

    // SIMPAN / UPDATE PROFIL
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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ], [
            'no_ktp.unique' => 'NIK ini sudah terdaftar di akun lain.',
            'no_ktp.digits' => 'NIK harus 16 digit.',
        ]);

        // Update Nama di Tabel Users (Akun)
        $user->update([
            'name' => $request->name
        ]);

        // Siapkan Data Profil
        $dataProfil = [
            'nama_lengkap' => $request->name,
            'no_ktp' => $request->no_ktp,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat_domisili' => $request->alamat_domisili,
        ];

        // LOGIKA UPLOAD FOTO
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($profil && $profil->foto) {
                Storage::disk('public')->delete($profil->foto);
            }

            // Simpan foto baru
            // Akan disimpan di: storage/app/public/uploads/profil
            $path = $request->file('foto')->store('uploads/profil', 'public');
            $dataProfil['foto'] = $path;
        }

        // Simpan ke Database
        KandidatProfil::updateOrCreate(
            ['user_id' => $user->id],
            $dataProfil
        );

        return redirect()->route('profil.index')->with('success', 'Profil berhasil diperbarui!');
    }
}