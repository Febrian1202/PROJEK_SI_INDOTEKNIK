<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan Halaman Login
    public function showLogin()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    // Menampilkan Halaman Register
    public function showRegister()
    {
        return view('auth.register', [
            'title'=> 'Register'
        ]);
    }

    public function processLogin(Request $request)
    {
        // Validasi Input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek Kredensial (Email & Password) ke Database
        if (Auth::attempt($credentials)) {

            // Jika Berhasil, Regenerasi Session (Untuk Keamanan)
            $request->session()->regenerate();

            // Cek Role User & Redirect
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->role === 'direktur') {
                return redirect()->route('direktur.dashboard');
            }

            // Default: Kandidat (Kembali ke Home)
            return redirect()->route('kandidat.dashboard');
        }

        // Jika Gagal Login
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    // PROSES LOGOUT
    public function logout(Request $request)
    {
        // Hapus sesi autentikasi pengguna saat ini
        Auth::logout();

        // Invalidate session (menghapus data sesi server)
        $request->session()->invalidate();

        // Regenerate CSRF token (untuk mencegah serangan CSRF pada sesi berikutnya)
        $request->session()->regenerateToken();

        // Redirect kembali ke halaman utama (atau halaman login)
        return redirect('/');
    }

    // LOGIKA REGISTER
    public function processRegister(Request $request)
    {
        // Validasi Input
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], // Email tidak boleh kembar
            'password' => ['required', 'string', 'min:8', 'confirmed'], // 'confirmed' akan mengecek input 'password_confirmation'
            'terms' => ['required'], // Checkbox syarat wajib dicentang
        ], [
            // Pesan Error
            'email.unique' => 'Email ini sudah terdaftar, silakan login.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 8 karakter.',
            'terms.required' => 'Anda harus menyetujui Syarat & Ketentuan.',
        ]);

        // Simpan User ke Database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
            'role' => 'kandidat', // Default Role untuk pendaftar umum
        ]);

        // Otomatis Login setelah daftar
        Auth::login($user);

        // Regenerasi session (standar keamanan)
        $request->session()->regenerate();

        // Redirect ke Home
        return redirect()->route('home')->with('success', 'Registrasi berhasil! Selamat datang.');
    }
}
