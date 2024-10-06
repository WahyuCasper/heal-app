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
            <a href="{{ route('fitur-lain') }}" id="openRatingModal" class="btn">Layanan Penanganan Kesehatan Mental</a>
        </div>
    </div>

    <!-- Modal Popup untuk Rating -->
    <div id="ratingModal" class="modal">
        <div class="modal-content">
          <span class="close-button">&times;</span>
          <h3>Beri Rating</h3>
          <form
            action="{{ route('store.rating') }}"
            method="POST"
            id="ratingForm"
          >
            @csrf
            <div class="flex-box">
              <div class="rating-stars">
                <input type="radio" name="rating" id="star5" value="5" />
                <label for="star5" class="fa fa-star"></label>

                <input type="radio" name="rating" id="star4" value="4" />
                <label for="star4" class="fa fa-star"></label>

                <input type="radio" name="rating" id="star3" value="3" />
                <label for="star3" class="fa fa-star"></label>

                <input type="radio" name="rating" id="star2" value="2" />
                <label for="star2" class="fa fa-star"></label>

                <input type="radio" name="rating" id="star1" value="1" />
                <label for="star1" class="fa fa-star"></label>
              </div>
            </div>
            <div class="form-group">
              <label for="name">Nama:</label>
              <input type="text" id="name" name="name" required /><br /><br />
              <label for="comment">Komentar:</label>
              <textarea name="comment" id="comment" rows="4" required></textarea>
            </div>
            <div class="flex-box">
              <button type="submit" class="submit-button">Kirim Rating</button>
            </div>
          </form>
        </div>
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
        // Mendapatkan elemen modal
        var modal = document.getElementById("ratingModal");

        // Mendapatkan tombol yang membuka modal
        var btn = document.querySelector(".btn");

        // Mendapatkan elemen <span> yang menutup modal
        var span = document.getElementsByClassName("close-button")[0];

        // Pastikan modal tidak terbuka saat halaman dimuat (ini penting)
        document.addEventListener("DOMContentLoaded", function () {
            modal.style.display = "none"; // Set modal agar tetap tersembunyi saat halaman pertama kali dimuat
        });

        // Ketika tombol diklik, buka modal
        btn.onclick = function (event) {
            event.preventDefault(); // Mencegah aksi default jika tombol adalah link
            modal.style.display = "block"; // Hanya buka modal saat tombol diklik
        };

        // Ketika pengguna mengklik <span> (x), tutup modal
        span.onclick = function () {
            modal.style.display = "none"; // Tutup modal saat tombol tutup (x) diklik
        };

        // Ketika pengguna mengklik di luar modal, tutup modal
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none"; // Tutup modal saat pengguna mengklik di luar modal
            }
        };

        // Menutup modal setelah form submit
        document.getElementById("ratingForm").addEventListener("submit", function () {
            modal.style.display = "none"; // Modal ditutup setelah form dikirim
        });

        
    </script>
</body>
</html>
