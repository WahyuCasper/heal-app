<?php

use App\Http\Controllers\AyoSemangatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\CekKesehatanMentalController;
use App\Http\Controllers\CurhatYukController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\FiturLainController;
use App\Http\Controllers\TentangKami;
use App\Http\Controllers\RatingController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/feature', [FeatureController::class, 'index'])->name('feature');
Route::get('/fitur-lain', [FiturLainController::class, 'index'])->name('fitur-lain');
Route::get('/ayo-semangat', [AyoSemangatController::class, 'index'])->name('ayo-semangat');
Route::get('/tentang-kami', [TentangKami::class, 'index'])->name('tentang-kami');
Route::get('/curhat-yuk', [CurhatYukController::class, 'index'])->name('curhat-yuk');

Route::get('/cek-kesehatan-mental', [CekKesehatanMentalController::class, 'index'])->name('cek-kesehatan-mental.index');
Route::post('/cek-kesehatan-mental', [CekKesehatanMentalController::class, 'submit'])->name('cek-kesehatan-mental.submit');
Route::get('/hasil', [HasilController::class, 'index'])->name('hasil');

Route::get('/selamat', function () {
    return view('selamat'); // Buat view 'selamat.blade.php' di folder resources/views
})->name('selamat');

Route::post('/store-rating', [RatingController::class, 'store'])->name('store.rating');

