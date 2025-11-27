<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterDokumen;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    // 1. INDEX (Daftar Dokumen)
    public function index()
    {
        $dokumen = MasterDokumen::latest()->paginate(10);
        return view('admin.dokumen.index', compact('dokumen'));
    }

    // 2. CREATE (Form Tambah)
    public function create()
    {
        return view('admin.dokumen.create');
    }

    // 3. STORE (Simpan Data)
    public function store(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255|unique:master_dokumen',
            'tipe_file' => 'required|string',
        ], [
            'nama_dokumen.unique' => 'Nama dokumen ini sudah ada.',
        ]);

        MasterDokumen::create([
            'nama_dokumen' => $request->nama_dokumen,
            'tipe_file' => $request->tipe_file,
        ]);

        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen berhasil ditambahkan!');
    }

    // 4. EDIT (Form Edit)
    public function edit($id)
    {
        $dokumen = MasterDokumen::findOrFail($id);
        return view('admin.dokumen.edit', compact('dokumen'));
    }

    // 5. UPDATE (Simpan Perubahan)
    public function update(Request $request, $id)
    {
        $dokumen = MasterDokumen::findOrFail($id);

        $request->validate([
            'nama_dokumen' => 'required|string|max:255|unique:master_dokumen,nama_dokumen,'.$id,
            'tipe_file' => 'required|string',
        ]);

        $dokumen->update([
            'nama_dokumen' => $request->nama_dokumen,
            'tipe_file' => $request->tipe_file,
        ]);

        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen berhasil diperbarui!');
    }

    // 6. DESTROY (Hapus Data)
    public function destroy($id)
    {
        $dokumen = MasterDokumen::findOrFail($id);
        
        // Cek apakah dokumen ini sedang dipakai di Posisi Lowongan?
        if ($dokumen->posisi()->count() > 0) {
            return back()->with('error', 'Gagal hapus! Dokumen ini sedang menjadi syarat di lowongan aktif.');
        }

        $dokumen->delete();
        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}