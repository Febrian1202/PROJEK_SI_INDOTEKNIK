<?php

namespace App\Http\Controllers\Admin;

use App\Models\Posisi;
use App\Models\MasterDokumen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PosisiController extends Controller
{
    //
    // 1. TAMPILKAN DAFTAR LOWONGAN
    public function index()
    {
        $title = 'CRUD Data Posisi';
        $posisi = Posisi::latest()->paginate(10);
        return view('admin.posisi.index', compact('posisi', 'title'));
    }

    // 2. FORM TAMBAH LOWONGAN
    public function create()
    {
        // Kita butuh daftar dokumen untuk dipilih sebagai syarat
        $dokumen = MasterDokumen::all();
        return view('admin.posisi.create', compact('dokumen'));
    }

    // 3. PROSES SIMPAN DATA BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama_posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'syarat_dokumen' => 'array', // Array ID dokumen yang dipilih
        ]);

        // Simpan Posisi
        $posisi = Posisi::create([
            'nama_posisi' => $request->nama_posisi,
            'deskripsi' => $request->deskripsi,
            'is_active' => true,
        ]);

        // Simpan Relasi Syarat Dokumen (Pivot)
        if ($request->has('syarat_dokumen')) {
            // Default wajib semua dulu biar gampang
            $pivotData = [];
            foreach ($request->syarat_dokumen as $dokumenId) {
                $pivotData[$dokumenId] = ['is_mandatory' => true];
            }
            $posisi->syaratDokumen()->sync($pivotData);
        }

        return redirect()->route('admin.posisi.index')->with('success', 'Lowongan berhasil ditambahkan!');
    }

    // 4. FORM EDIT
    public function edit(Posisi $posisi)
    {
        $dokumen = MasterDokumen::all();
        // Ambil ID dokumen yang sudah terpilih sebelumnya
        $selectedDokumen = $posisi->syaratDokumen->pluck('id')->toArray();
        
        return view('admin.posisi.edit', compact('posisi', 'dokumen', 'selectedDokumen'));
    }

    // 5. PROSES UPDATE
    public function update(Request $request, Posisi $posisi)
    {
        $request->validate([
            'nama_posisi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $posisi->update([
            'nama_posisi' => $request->nama_posisi,
            'deskripsi' => $request->deskripsi,
            'is_active' => $request->has('is_active'), // Checkbox behavior
        ]);

        // Update Relasi Syarat
        if ($request->has('syarat_dokumen')) {
            $pivotData = [];
            foreach ($request->syarat_dokumen as $dokumenId) {
                $pivotData[$dokumenId] = ['is_mandatory' => true];
            }
            $posisi->syaratDokumen()->sync($pivotData);
        } else {
            $posisi->syaratDokumen()->detach(); // Hapus semua syarat jika tidak ada yang dipilih
        }

        return redirect()->route('admin.posisi.index')->with('success', 'Lowongan berhasil diperbarui!');
    }

    // 6. HAPUS DATA
    public function destroy(Posisi $posisi)
    {
        $posisi->syaratDokumen()->detach(); // Hapus relasi dulu
        $posisi->delete();
        return redirect()->route('admin.posisi.index')->with('success', 'Lowongan dihapus.');
    }
}
