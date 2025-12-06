<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpRegisterMail;
use Carbon\Carbon;

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

            // Ambil data user yang baru saja login
            $user = Auth::user();

            // --- [LOGIKA BARU] CEK STATUS VERIFIKASI ---
            if ($user->email_verified_at === null) {
                // Jika belum verifikasi:

                // 1. Generate OTP Baru & Update Database
                $newOtp = rand(100000, 999999);
                $user->update([
                    'otp_code' => $newOtp,
                    'otp_expires_at' => \Carbon\Carbon::now()->addMinutes(10),
                ]);

                // 2. Kirim Email OTP
                try {
                    Mail::to($user->email)->send(new OtpRegisterMail($newOtp));
                } catch (\Exception $e) {
                    // Log error jika perlu, tapi biarkan flow lanjut agar user bisa minta resend manual
                }
                
                // 1. Logout paksa (batalkan login)
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                // 2. Lempar ke halaman Verifikasi OTP
                return redirect()->route('verification.notice', ['email' => $user->email])
                    ->with('error', 'Akun Anda belum diverifikasi. Silakan masukkan kode OTP yang telah dikirim ke email.');
            }
            //-----------------------------

            // Jika Sudah Verifikasi, Lanjut regenerate session
            $request->session()->regenerate();

            // Cek role user & redirect
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            if ($user->role === 'direktur') {
                return redirect()->route('direktur.dashboard');
            }
            // Default
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

        // Generate OTP 6 Digit
        $otp = rand(100000, 999999);

        // Simpan User ke Database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
            'role' => 'kandidat', // Default Role untuk pendaftar umum
            'otp_code' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(10), // Berlaku 10 menit
        ]);

        // Kirim Email (Pastikan kondigurasi SMTP)
        try {
            Mail::to($user->email)->send(new OtpRegisterMail($otp));
        } catch (\Exception $e) {
            // Jika gagal kirim email, hapus user biar bisa daftar ulang (opsional)
            $user->delete();
            return back()->with('error', 'Gagal mengirim email. Cek koneksi internet atau konfigurasi mail.');
        }

        // Redirecct ke Halaman Verifikasi (Bawa email biar user gak perlu ngetik lagi)
        return redirect()->route('verification.notice', [
            'email' => $user->email
        ]);
    }

    // tampilkan halaman input otp
    public function showVerification(Request $request) {
        return view('auth.verify-otp', [
            'email' => $request->email,
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
        ]);

        // cari user
        $user = User::where('email', $request->email)->first();

        // cek, user ada?
        if (! $user) {
            return back()->withErrors(['otp' => 'User tidak ditemukan.']);
        }

        // cek, otp cocok?
        if ($user->otp_code != $request->otp) {
            return back()->withErrors(['otp' => 'Kode OTP salah']);
        }

        // cek, otp kadaluarsa?
        if (Carbon::now()->greaterThan($user->otp_expires_at)) {
            return back()->withErrors(['otp' => 'Kode OTP sudah kadaluarsa. Silahkan daftar ulang.']);
        }

        // Jika sukses:
        // Hapus OTP
        $user->update([
            'otp_code' => null,
            'otp_expires_at' => null,
            'email_verified_at' => now()
        ]);

        // login
        Auth::login($user);
        $request->session()->regenerate();

        // masuk dashboard
        return redirect()->route('kandidat.dashboard')->with('success', 'Verifikasi berhasil! Selamat datang.');
    }

    // kirim ulang otp (resend)
    public function resendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if(! $user) {
            return back()->withErrors(['email' => 'Email']);
        }

        // generate OTP baru
        $newOtp = rand(100000,999999);

        // update databasse
        $user->update([
            'otp_code' =>$newOtp,
            'otp_expires_at' => Carbon::now()->addMinutes(10)
        ]);

        // kirim email lagi
        try {
            Mail::to($user->email)->send(new OtpRegisterMail($newOtp));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email ualng. Cek koneksi.');
        }

        return back()->with('success','Kode OTP baru telah dikirim ke email Anda.');
    }
}
