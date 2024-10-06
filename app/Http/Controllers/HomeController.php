<?php
namespace App\Http\Controllers;
use App\Models\Rating;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sessionId = uniqid();
        session()->put('session_id', $sessionId);

        // Ambil semua review rating
        $ratings = Rating::all();

        // Cek apakah ada rating
        if ($ratings->count() > 0) {
            // Hitung rata-rata rating dan bulatkan ke bawah
            $averageRating = round($ratings->avg('rating'), 1); // Membatasi hasil ke 1 angka di belakang koma
        } else {
            // Jika tidak ada rating, set nilai default untuk rata-rata rating
            $averageRating = 0;
        }

        // Kirim data ke view
        return view('home', compact('ratings', 'averageRating'));
    
    }
}
