<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // Logika dari route tadi dipindah ke sini
        return view('home', ['title' => 'Home']);
    }
}
