<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AyoSemangatController extends Controller
{
    public function index()
    {
        // Logic untuk mengambil data fitur atau menampilkan halaman fitur
        return view('ayo-semangat'); // Pastikan file view adalah 'fitur.blade.php'
    }
}
