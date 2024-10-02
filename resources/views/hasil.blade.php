<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/hasil.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Cek Kesehatan Mental|HEAL</title>
</head>
<body>
    <div class="card">
        <h1>Hasil Analisis Kesehatan Mental</h1>
        <h2>Tingkat Depresi:</h2>
        <h2 class="tingkat">{{ session('depression_level') }}</h2>
        <hr class="divider" />
        <h2>Faktor penyebab:</h2>
        <div class="chart-container">
            <canvas id="myPieChart"></canvas>
        </div>
        <hr class="divider" />
        <div class="description">
            Hasil tingkat depresimu
            <strong>{{ session('depression_level') }}</strong>. Klik tombol dibawah
            ini untuk menuju layanan penanganan lanjutan kesehatan mentalmu.
        </div>
        <div class="btn-container">
            <a href="{{ route('fitur-lain') }}" class="btn">Layanan Penanganan Kesehatan Mental</a>
        </div>
    </div>
    
    <div class="card">
      @if (session('results'))
      <h2>Hasil Prediksi Ekspresi:</h2>
      <ul>
        @foreach (session('results') as $result)
        <li>{{ $result['photo'] }}: {{ $result['prediction'] }}</li>
        @endforeach
      </ul>
      @endif
    </div>

    <div class='card'>
        ini adalah kuisioner :<strong>{{ session('kuisioner') }}</strong><br/>
        ini adalah svm :<strong>{{ session('svm') }}</strong><br/>
        ini adalah x/svm+kuisioner:<strong>{{ session('x') }}</strong><br/>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const chartData = {!! json_encode($chartData) !!};
            const ctx = document.getElementById("myPieChart").getContext("2d");
            const myPieChart = new Chart(ctx, {
                type: "pie",
                data: {
                    labels: chartData.labels,
                    datasets: [
                        {
                            label: "Faktor Penyebab",
                            data: chartData.data,
                            backgroundColor: [
                                "rgba(54, 162, 235, 0.7)", // Biru
                                "rgba(255, 99, 132, 0.7)", // Merah
                                "rgba(255, 206, 86, 0.7)", // Kuning
                                "rgba(75, 192, 192, 0.7)", // Hijau
                            ],
                            borderColor: [
                                "rgba(255, 255, 255, 1)",
                                "rgba(255, 255, 255, 1)",
                                "rgba(255, 255, 255, 1)",
                                "rgba(255, 255, 255, 1)",
                            ],
                            borderWidth: 3,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: "bottom",
                        },
                        tooltip: {
                            enabled: true,
                        },
                        datalabels: {
                            formatter: (value, ctx) => {
                                let sum = ctx.dataset.data.reduce((a, b) => a + b, 0);
                                let percentage = ((value / sum) * 100).toFixed(2) + "%";
                                return percentage;
                            },
                            color: "#fff",
                            backgroundColor: "#666666",
                            borderRadius: 5,
                            padding: 6,
                            font: {
                                weight: "bold",
                                size: 14,
                            },
                        },
                    },
                },
            });
        });
    </script>
</body>
</html>
