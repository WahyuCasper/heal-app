<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangKami extends Controller
{
    public function index()
    {
        // Logic untuk mengambil data fitur atau menampilkan halaman fitur
        return view('tentang-kami'); // Pastikan file view adalah 'fitur.blade.php'
    }
}
