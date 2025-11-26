<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    // Proses Login (Nanti diisi logika autentikasi)
    public function processLogin(Request $request)
    {
        // Sementara return string dulu
        return "Proses Login sedang berjalan...";
    }

    // Proses Register (Nanti diisi logika simpan user)
    public function processRegister(Request $request)
    {
        // Sementara return string dulu
        return "Proses Registrasi sedang berjalan...";
    }
}
