<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    // Menampilkan Halaman Login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Menampilkan Halaman Register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses Register (Nanti diisi logika simpan user)
    public function processRegister(Request $request)
    {
        // Sementara return string dulu
        return "Proses Registrasi sedang berjalan...";
    }

    public function processLogin(Request $request)
    {
        // 1. Validasi Input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Cek Kredensial (Email & Password) ke Database
        if (Auth::attempt($credentials)) {

            // Jika Berhasil, Regenerasi Session (Untuk Keamanan)
            $request->session()->regenerate();

            // 3. Cek Role User & Redirect
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->role === 'direktur') {
                return redirect()->route('direktur.dashboard');
            }

            // Default: Kandidat (Kembali ke Home)
            return redirect()->route('home');
        }

        // 4. Jika Gagal Login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // PROSES LOGOUT
    public function logout(Request $request)
    {
        // 1. Hapus sesi autentikasi pengguna saat ini
        Auth::logout();

        // 2. Invalidate session (menghapus data sesi server)
        $request->session()->invalidate();

        // 3. Regenerate CSRF token (untuk mencegah serangan CSRF pada sesi berikutnya)
        $request->session()->regenerateToken();

        // 4. Redirect kembali ke halaman utama (atau halaman login)
        return redirect('/');
    }
}
