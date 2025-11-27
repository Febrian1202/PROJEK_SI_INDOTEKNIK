<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirekturController extends Controller
{
    //
    public function index()
    {
        return view('direktur.dashboard');
    }
}
