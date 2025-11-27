<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    // INDEX
    public function index()
    {
        // Kita tampilkan jumlah karyawan di setiap site juga (biar informatif)
        $sites = Site::withCount('karyawan')->latest()->paginate(10);
        return view('admin.sites.index', compact('sites'));
    }

    // CREATE
    public function create()
    {
        return view('admin.sites.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'nama_site' => 'required|string|max:255',
            'lokasi_fisik' => 'required|string|max:255',
        ]);

        Site::create([
            'nama_site' => $request->nama_site,
            'lokasi_fisik' => $request->lokasi_fisik,
        ]);

        return redirect()->route('admin.sites.index')->with('success', 'Site baru berhasil ditambahkan!');
    }

    // EDIT
    public function edit(Site $site)
    {
        return view('admin.sites.edit', compact('site'));
    }

    // UPDATE
    public function update(Request $request, Site $site)
    {
        $request->validate([
            'nama_site' => 'required|string|max:255',
            'lokasi_fisik' => 'required|string|max:255',
        ]);

        $site->update([
            'nama_site' => $request->nama_site,
            'lokasi_fisik' => $request->lokasi_fisik,
        ]);

        return redirect()->route('admin.sites.index')->with('success', 'Data site diperbarui!');
    }

    // DESTROY
    public function destroy(Site $site)
    {
        // Cek apakah ada karyawan di site ini? Kalau ada, jangan dihapus sembarangan.
        if ($site->karyawan()->count() > 0) {
            return back()->with('error', 'Gagal hapus! Masih ada karyawan yang ditempatkan di site ini.');
        }

        $site->delete();
        return redirect()->route('admin.sites.index')->with('success', 'Site berhasil dihapus.');
    }
}