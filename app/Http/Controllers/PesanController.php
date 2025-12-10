<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function store(Request $request)
    {
        // Validasi Input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Simpan ke Database
        Pesan::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Kembali ke halaman kontak dengan pesan sukses
        return redirect()->back()->with('success', 'Terima kasih! Pesan Anda telah terkirim.');
    }

    // Menampilkan Daftar Pesan untuk Admin
    public function index()
    {
        $pesanMasuk = Pesan::latest()->paginate(10);
        return view('admin.pesan.index', compact('pesanMasuk'));
    }

    // Menghapus Pesan
    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();

        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}