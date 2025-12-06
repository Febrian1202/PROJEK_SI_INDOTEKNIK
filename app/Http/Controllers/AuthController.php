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
        // 1. Validasi Input (Hapus 'unique:users' dari sini dulu)
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'], // Hapus unique di sini
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['required'],
        ]);

        // 2. Cek apakah Email sudah ada?
        $existingUser = User::where('email', $request->email)->first();

        // Jika email sudah ada DAN sudah terverifikasi -> Tolak
        if ($existingUser && $existingUser->email_verified_at != null) {
            return back()->withErrors(['email' => 'Email ini sudah terdaftar dan aktif. Silakan login.'])->withInput();
        }

        // Generate Data Baru
        $otp = rand(100000, 999999);
        $passwordHash = Hash::make($request->password);

        // 3. LOGIKA SMART: Update atau Create
        if ($existingUser && $existingUser->email_verified_at == null) {
            // A. KONDISI: User lama tapi belum verifikasi (SAMPAH)
            // Kita TIMPA data lamanya dengan data baru (Update)
            $user = $existingUser;
            $user->update([
                'name' => $request->name,
                'password' => $passwordHash, // Update password baru
                'role' => 'kandidat',
                'otp_code' => $otp,
                'otp_expires_at' => \Carbon\Carbon::now()->addMinutes(10),
            ]);
        } else {
            // B. KONDISI: User benar-benar baru (Create)
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $passwordHash,
                'role' => 'kandidat',
                'otp_code' => $otp,
                'otp_expires_at' => \Carbon\Carbon::now()->addMinutes(10),
            ]);
        }

        // 4. Kirim Email & Redirect (Sama seperti sebelumnya)
        try {
            \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\OtpRegisterMail($otp));
        } catch (\Exception $e) {
            // Jika gagal kirim email dan ini user baru, hapus aja biar bersih
            if (!$existingUser) $user->delete();
            return back()->with('error', 'Gagal mengirim email. Cek koneksi internet.');
        }

        return redirect()->route('verification.notice', ['email' => $user->email]);
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
