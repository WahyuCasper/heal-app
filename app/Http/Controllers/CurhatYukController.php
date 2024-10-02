<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KuisionerAnswer;

class CurhatYukController extends Controller
{
    public function index()
    {
        // Ambil session_id dari session
        $sessionId = session()->get('session_id');

        // Periksa apakah session_id tersedia
        if ($sessionId) {
            // Cari data berdasarkan session_id
            $answerData = KuisionerAnswer::where('session_id', $sessionId)->first();

            // Periksa apakah data ditemukan
            if ($answerData) {
                // Ambil nilai depression_level
                $depressionLevel = $answerData->depression_level;

                // Cek apakah depression_level sesuai dengan ketentuan
                if (in_array($depressionLevel, ['Depresi rendah', 'Depresi sedang', 'Depresi tinggi'])) {
                    // Jika sesuai, tampilkan view dengan data
                    return view('curhat-yuk');
                } else {
                    // Jika tidak sesuai, redirect dengan pesan error
                    return redirect()->route('feature')->with('error', 'Anda tidak memiliki tidak memiliki gejala depresi.');
                }
            } else {
                // Jika data tidak ditemukan
                return redirect()->route('cek-kesehatan-mental.index')->with('error','Untuk mengakses fitur Curhat Yuk anda harus terindikasi memiliki gejala depresi. Ayoo identifikasi kesehatan mental anda sekarang!!');
            }
        } else {
            // Jika session_id tidak tersedia
            return redirect()->route('cek-kesehatan-mental.index')->with('error','Untuk mengakses fitur Curhat Yuk ini anda harus terindikasi memiliki gejala depresi. Ayoo identifikasi kesehatan mental anda sekarang!!');
        }
    }
}
