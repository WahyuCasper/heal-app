<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        // Logic untuk mengambil data fitur atau menampilkan halaman fitur
        return view('feature'); // Pastikan file view adalah 'fitur.blade.php'
    }
}
