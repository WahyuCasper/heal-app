<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HasilController extends Controller
{
    public function index()
    {
        // Ambil data dari session
        $chartData = session('chart_data');

        // Pastikan chartData ada di session
        if (!$chartData) {
            return redirect()->route('cek-kesehatan-mental.index')->with('error', 'Tidak ada data untuk ditampilkan.');
        }

        return view('hasil', compact('chartData'));
    }
}
