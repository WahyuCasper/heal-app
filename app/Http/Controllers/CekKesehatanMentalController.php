<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\KuisionerAnswer;
use Illuminate\Support\Facades\Log;

class CekKesehatanMentalController extends Controller
{
    public function index()
    {
        $sessionId = uniqid();
        session()->put('session_id', $sessionId);
        return view('cek-kesehatan-mental');
    }

    public function submit(Request $request)
    {
        try {
            $sessionId = session()->get('session_id');
            $validatedData = $request->validate([
                'q1' => 'required|string',
                'q2' => 'required|string',
                'q3' => 'required|string',
                'q4' => 'required|string',
                'q5' => 'required|string',
                'q6' => 'required|string',
                'q7' => 'required|string',
                'q8' => 'required|string',
                'q9' => 'required|string',
                'q10' => 'required|string',
                'q11' => 'required|string',
                'q12' => 'required|string',
                'q13' => 'required|string',
                'q14' => 'required|string',
                'q15' => 'required|string',
                'q16' => 'required|string',
                'q17' => 'required|string',
                'q18' => 'required|string',
                'q19' => 'required|string',
                'q20' => 'required|string',
                'q21' => 'required|string',
                'q22' => 'required|string',
                'q23' => 'required|string',
                'q24' => 'required|string',
                'q25' => 'required|string',
                'q26' => 'required|string',
                'q27' => 'required|string',
                'q28' => 'required|string',
                'q29' => 'required|string',
                'q30' => 'required|string',
                'q31' => 'required|string',
                'q32' => 'required|string',
                'q33' => 'required|string',
                'q34' => 'required|string',
                'q35' => 'required|string',
                'q36' => 'required|string',
                'q37' => 'required|string',
                'q38' => 'required|string',
                'q39' => 'required|string',
                'q40' => 'required|string',
                'photo1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
                'photo2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'photo3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Menangani upload foto dan menyimpan path ke array
            $pathArray = [];
            for ($i = 1; $i <= 3; $i++) {
                if ($request->hasFile("photo$i")) {
                    $path = $request->file("photo$i")->store('photos', 'public');
                    $pathArray["photo$i"] = storage_path("app/public/$path");
                }
            }

            // Simpan semua data ke dalam database
            $validatedData['session_id'] = $sessionId;
            $validatedData = array_merge($validatedData, $pathArray);
            $answers=KuisionerAnswer::create($validatedData);

            // Proses data untuk chart
            $chartData = $this->processChartData($answers);

            // Simpan data chart ke session
            session()->put('chart_data', $chartData);

            // Mengirim permintaan POST ke Flask API
            $response = Http::post('http://127.0.0.1:5000/process_photos', [
                'photo_paths' => array_values($pathArray),
            ]);

            if ($response->successful()) {
                $results = $response->json();

                // Ekstrak prediksi
                $photo1 = $results[0]['prediction'];
                $photo2 = $results[1]['prediction'];
                $photo3 = $results[2]['prediction'];

                // Klasifikasi tingkat depresi
                $svmOutput = $this->classifyDepression($photo1, $photo2, $photo3);
                $questionnaireScore = $this->calculateDepressionLevel($answers);
                $x = ($svmOutput * 0.4) + ($questionnaireScore * 0.6);
                $depression_level = $this->classifyDepressionLevel($x);

                $answers->update([
                    'depression_level' => $depression_level,
                ]);

                if ($depression_level === "Tidak ada depresi") {
                    return redirect()->route('selamat')->with([
                        'success' => 'Selamat! Anda tidak menunjukkan tanda-tanda depresi.',
                    ]);
                }
                else{
                    return redirect()->route('hasil')->with([
                        'success' => 'Data berhasil diupload dan diproses!',
                        'results' => $results,
                        'x' => $x,
                        'kuisioner' => $questionnaireScore,
                        'svm' => $svmOutput,
                        'depression_level' => $depression_level,
                        'chart_data' => session()->get('chart_data') // Ambil data chart dari session
                    ]);
                }

            } else {
                throw new \Exception('Gagal memproses foto dengan API Flask.');
            }
        } catch (\Exception $e) {
            Log::error('Error saat menyimpan data ke database atau memproses foto:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    private function classifyDepression($photo1, $photo2, $photo3)
    {
        // Cek apakah terdeteksi depresi berdasarkan analisis foto (SVM Output)
        if ($photo1 == 'positif' && $photo2 == 'positif' && $photo3 == 'positif') {
            return 1; // Tidak depresi
        } elseif ($photo1 == 'positif' && $photo2 == 'positif' && $photo3 == 'negatif') {
            return 3; // Depresi
        } elseif ($photo1 == 'positif' && $photo2 == 'negatif' && $photo3 == 'positif') {
            return 2; // Depresi
        } elseif ($photo1 == 'positif' && $photo2 == 'negatif' && $photo3 == 'negatif') {
            return 4; // Depresi
        } elseif ($photo1 == 'negatif' && $photo2 == 'positif' && $photo3 == 'positif') {
            return 2; // Depresi
        } elseif ($photo1 == 'negatif' && $photo2 == 'positif' && $photo3 == 'negatif') {
            return 4; // Depresi
        } elseif ($photo1 == 'negatif' && $photo2 == 'negatif' && $photo3 == 'positif') {
            return 4; // Depresi
        } elseif ($photo1 == 'negatif' && $photo2 == 'negatif' && $photo3 == 'negatif') {
            return 4; // Depresi
        } else {
            return 1; // Tidak dapat ditentukan, asumsikan tidak depresi
        }
    }
    
    // Kuisioner Output
    public function calculateDepressionLevel($answers)
    {
        $totalGuttmanScore = 0;
        for ($i = 1; $i <= 20; $i++) {
            if (isset($answers["q" . $i])) {
                $totalGuttmanScore += intval($answers["q" . $i]);
            }
        }
    
            // Tentukan tingkat depresi berdasarkan skor total
        if ($totalGuttmanScore >= 0 && $totalGuttmanScore <= 15) {
            return 1;
        } elseif ($totalGuttmanScore >= 16 && $totalGuttmanScore <= 30) {
            return 2;
        } elseif ($totalGuttmanScore >= 31 && $totalGuttmanScore <= 45) {
            return 3;
        } elseif ($totalGuttmanScore >= 46 && $totalGuttmanScore <= 60) {
            return 4;
        } else {
            return 1;
        }
    }

    // Fungsi untuk klasifikasi tingkat depresi berdasarkan nilai x
    private function classifyDepressionLevel($x)
    {
        if ($x <= 1.5) {
            return 'Tidak ada depresi';
        } elseif ($x <= 2.5) {
            return 'Depresi rendah';
        } elseif ($x <= 3.5) {
            return 'Depresi sedang';
        } else {
            return 'Depresi tinggi';
        }
    }
    
    private function processChartData($answers)
    {
        // Proses data untuk ditampilkan di pie-chart
        // Misalnya, hitung presentase untuk masing-masing faktor
        $factors = [
            'Tekanan Akademik' => $answers['q21'] + $answers['q22'] + $answers['q23'] + $answers['q24'], // Contoh agregasi
            'Ketimpangan Ekonomi' => $answers['q25'] + $answers['q26'] + $answers['q27'] + $answers['q28'] + $answers['q29'] + $answers['q30'] + $answers['q31'],
            'Isolasi Sosial' => $answers['q32'] + $answers['q33'] + $answers['q34'] + $answers['q35'],
            'Stigma terkait Penyakit Mental' => $answers['q36'] + $answers['q37'] + $answers['q38'] + $answers['q39'] + $answers['q40'],
        ];

        return [
            'labels' => array_keys($factors),
            'data' => array_values($factors),
        ];
    }
}
