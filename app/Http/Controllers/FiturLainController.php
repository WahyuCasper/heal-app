<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiturLainController extends Controller
{
    public function index()
    {
        // Logic untuk mengambil data fitur atau menampilkan halaman fitur
        return view('fitur-lain'); // Pastikan file view adalah 'fitur.blade.php'
    }
}
