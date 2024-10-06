<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function store(Request $request)
{
    // Ambil session_id dari session
    $sessionId = session('session_id');

    // Simpan data rating ke database
    Rating::create([
        'session_id' => $sessionId,
        'name' => $request->input('name'),
        'rating' => $request->input('rating'),
        'comment' => $request->input('comment'),
    ]);

    return redirect()->route('fitur-lain')->with('success', 'Rating berhasil disimpan!');
}

}
