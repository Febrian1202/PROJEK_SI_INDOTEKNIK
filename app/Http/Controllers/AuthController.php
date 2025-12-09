<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpRegisterMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

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
            'title' => 'Register'
        ]);
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // --- [MODIFIKASI] CEK STATUS VERIFIKASI ---
            // Tambahkan kondisi: Hanya jika role-nya 'kandidat'
            if ($user->role === 'kandidat' && $user->email_verified_at === null) {

                // 1. Generate OTP Baru & Kirim Email (Sama seperti sebelumnya)
                $newOtp = rand(100000, 999999);
                $user->update([
                    'otp_code' => $newOtp,
                    'otp_expires_at' => Carbon::now()->addMinutes(10),
                ]);

                try {
                    Mail::to($user->email)->send(new OtpRegisterMail($newOtp));
                } catch (\Exception $e) {
                    // Silent fail
                }

                // 2. Logout & Redirect
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('verification.notice', ['email' => $user->email])
                    ->with('error', 'Akun belum diverifikasi. Kode OTP baru telah dikirim ke email Anda.');
            }
            // -------------------------------------------

            // Jika lolos (Admin, Direktur, atau Kandidat yang sudah verify)
            $request->session()->regenerate();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->role === 'direktur') {
                return redirect()->route('direktur.dashboard');
            }

            return redirect()->route('kandidat.dashboard');
        }

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
                'otp_expires_at' => Carbon::now()->addMinutes(10),
            ]);
        } else {
            // B. KONDISI: User benar-benar baru (Create)
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $passwordHash,
                'role' => 'kandidat',
                'otp_code' => $otp,
                'otp_expires_at' => Carbon::now()->addMinutes(10),
            ]);
        }

        // 4. Kirim Email & Redirect (Sama seperti sebelumnya)
        try {
            Mail::to($user->email)->send(new OtpRegisterMail($otp));
        } catch (\Exception $e) {
            // Jika gagal kirim email dan ini user baru, hapus aja biar bersih
            if (!$existingUser) $user->delete();
            return back()->with('error', 'Gagal mengirim email. Cek koneksi internet.');
        }

        return redirect()->route('verification.notice', ['email' => $user->email]);
    }

    // tampilkan halaman input otp
    public function showVerification(Request $request)
    {
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

        if (! $user) {
            return back()->withErrors(['email' => 'Email']);
        }

        // generate OTP baru
        $newOtp = rand(100000, 999999);

        // update databasse
        $user->update([
            'otp_code' => $newOtp,
            'otp_expires_at' => Carbon::now()->addMinutes(10)
        ]);

        // kirim email lagi
        try {
            Mail::to($user->email)->send(new OtpRegisterMail($newOtp));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email ualng. Cek koneksi.');
        }

        return back()->with('success', 'Kode OTP baru telah dikirim ke email Anda.');
    }

    // Tampilkan Form Input Email
    public function showForgotPassword()
    {
        return view('auth.forgot-password', [
            'title' => 'Lupa Password'
        ]);
    }

    // Kirim Link Reset ke Email
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Kirim link reset password
        // Pastikan User model punya trait "CanResetPassword"
        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Link reset password telah dikirim ke email Anda.');
        }
        return back()->withErrors(['email' => __($status)]);
    }

    // Tampilkan Form Reset Password (User klik link dari email)
    public function showResetPassword(Request $request) 
    {
        return view('auth.reset-password', ['token' => $request->token, 'email' => $request->email]);
    }

    // Proses update password baru
    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Proses reset password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET)
        {
            return redirect()->route('login')->with('success', 'Password berhasil diubah! Silakan login dengan password baru.');
        }

        return back()->withErrors(['email' => [__($status)]]);
    }
}
