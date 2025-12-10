<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function contact()
    {
        return view("contact", [
            "title" => "Kontak - PT. Indoteknik Prima Mekongga"
        ]);
    }
}