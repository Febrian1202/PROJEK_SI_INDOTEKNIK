<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
{
    // Mengirim variabel $title ke view 'home'
    return view('home', [
        'title' => 'Beranda - PT. Indoteknik Prima Mekongga'
    ]);
}
}
