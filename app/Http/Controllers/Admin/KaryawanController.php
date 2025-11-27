<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Site;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // 1. DAFTAR KARYAWAN
    public function index(Request $request)
    {
        $query = Karyawan::with(['kandidat', 'site', 'lamaran.posisi']);

        // Filter Site
        if ($request->has('site_id') && $request->site_id != '') {
            $query->where('site_id', $request->site_id);
        }

        // Filter Status
        if ($request->has('status') && $request->status != '') {
            $query->where('status_karyawan', $request->status);
        }

        // Search Nama
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('kandidat', function($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%$search%");
            });
        }

        $karyawan = $query->latest('tgl_bergabung')->paginate(10);
        $sites = Site::all(); // Untuk filter dropdown

        return view('admin.karyawan.index', compact('karyawan', 'sites'));
    }

    // 2. FORM EDIT KARYAWAN
    public function edit($id)
    {
        $karyawan = Karyawan::with(['kandidat', 'lamaran.posisi'])->findOrFail($id);
        $sites = Site::all();

        return view('admin.karyawan.edit', compact('karyawan', 'sites'));
    }

    // 3. UPDATE DATA KARYAWAN
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nik_karyawan' => 'required|string|unique:karyawan,nik_karyawan,' . $id,
            'site_id' => 'required|exists:sites,id',
            'status_karyawan' => 'required|string',
            'tgl_bergabung' => 'required|date',
        ]);

        $karyawan->update([
            'nik_karyawan' => $request->nik_karyawan,
            'site_id' => $request->site_id,
            'status_karyawan' => $request->status_karyawan,
            'tgl_bergabung' => $request->tgl_bergabung,
        ]);

        return redirect()->route('admin.karyawan.index')->with('success', 'Data karyawan berhasil diperbarui!');
    }

    // 4. HAPUS KARYAWAN (TERMINATE)
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('admin.karyawan.index')->with('success', 'Data karyawan dihapus.');
    }
}