<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fitur|HEAL</title>
    <link rel="stylesheet" href="{{ asset('css/style-fitur.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function() {
          @if (session('error'))
              alert("{{ session('error') }}");
          @endif
      });
    </script>
  </head>
  <body>
    
    <div class="sidebar" id="sidebar">
      <div class="grid-2">
        <div class="fiturrr">Fitur yang tersedia</div>
        <div class="toggle-btn" id="close-btn">&#10006;</div>
      </div>
      <a href="{{ route('cek-kesehatan-mental.index') }}" class="nav-button"
        >Cek Kesehatan Mental</a
      >
      <a href="{{ route('curhat-yuk') }}" class="nav-button">Curhat Yuk</a>
      <a href="{{ route('ayo-semangat') }}" class="nav-button">Ayo Semangat</a>
      <a href="{{ route('home') }}" class="nav-button">
        <i class="fas fa-home"></i> Beranda
      </a>
    </div>

    <div class="open-btn" id="open-btn">&#9776;</div>

    <!-- Main content area -->
    <div class="main-content" id="main-content">
      <section class="section-card" id="cek-kesehatan-mental">
        <h2 class="section-title">Cek Kesehatan Mental</h2>
        <p class="text-justify">
          <span class="content-preview"
            >Fitur "Cek Kesehatan Mental" memungkinkan pengguna untuk mendeteksi kondisi kesehatan mental mereka secara anonim melalui analisis ekspresi wajah.</span
          >
          <span class="content-full"
            >Fitur "Cek Kesehatan Mental" memungkinkan pengguna untuk mendeteksi kondisi kesehatan mental mereka secara anonim melalui analisis ekspresi wajah. Teknologi machine learning berbasis Support Vector Machine (SVM) akan mengidentifikasi pola-pola yang mengindikasikan gejala depresi, kecemasan, atau stres. Proses ini berlangsung selama pengguna mengisi kuesioner yang berisi pertanyaan tentang kondisi mental mereka. Hasil deteksi ini akan diklasifikasikan berdasarkan tingkat depresi yang terdeteksi (rendah, sedang, atau tinggi), serta memberikan rekomendasi untuk tindakan lanjutan jika diperlukan. Fitur ini bertujuan membantu pengguna memahami kondisi mental mereka secara lebih mendalam dan mengarahkan mereka untuk mencari bantuan yang sesuai jika diperlukan.</span
          >
          <a href="#" class="see-more">Tutup</a>
        </p>
        <div class="btn-container">
        <a href="{{ route('cek-kesehatan-mental.index') }}" class="coba-btn">Coba Fitur</a>
        </div>
      </section>

      <section class="section-card" id="curhat-yuk">
        <h2 class="section-title">Curhat Yuk</h2>
        <p class="text-justify">
          <span class="content-preview"
            >Fitur "Curhat Yuk" menyediakan ruang bagi pengguna untuk mencurahkan isi hati mereka kepada konselor yang sudah disediakan.</span
          >
          <span class="content-full"
            >Fitur "Curhat Yuk" menyediakan ruang bagi pengguna untuk mencurahkan isi hati mereka kepada konselor yang sudah disediakan. Pengguna dapat berbagi cerita, pengalaman, atau perasaan mereka tanpa rasa takut akan stigma atau penilaian. Layanan ini dirancang untuk memberikan rasa lega kepada pengguna yang membutuhkan tempat untuk berbicara, terutama tentang masalah kesehatan mental seperti kecemasan, depresi, dan tekanan hidup lainnya. Fitur ini juga memberikan akses kepada pengguna untuk mendapatkan dukungan emosional dari konselor atau komunitas yang peduli. Hal ini diharapkan dapat membantu mereka merasa lebih baik dan didengar.</span
          >
          <a href="#" class="see-more">Tutup</a>
        </p>
        <div class="btn-container">
          <a href="{{ route('curhat-yuk') }}" class="coba-btn">Coba Fitur</a>
        </div>
      </section>

      <section class="section-card" id="ayo-semangat">
        <h2 class="section-title">Ayo Semangat</h2>
        <p class="text-justify">
          <span class="content-preview"
            >Fitur "Ayo Semangat" menyediakan video-video motivasi yang dipersonalisasi untuk membantu pengguna yang merasa atau terdeteksi mengalami masalah kesehatan mental.</span
          >
          <span class="content-full"
            >Fitur "Ayo Semangat" menyediakan video-video motivasi yang dipersonalisasi untuk membantu pengguna yang merasa atau terdeteksi mengalami masalah kesehatan mental. Berdasarkan hasil dari fitur "Cek Kesehatan Mental", pengguna yang teridentifikasi memiliki kondisi mental yang kurang baik akan menerima rekomendasi video-video yang memberikan semangat, dorongan positif, dan saran praktis. Video-video ini mencakup berbagai topik motivasi seperti manajemen stres, cara mengatasi kecemasan, serta tips menjaga keseimbangan emosi. Fitur ini bertujuan untuk membantu pengguna menghadapi tantangan kesehatan mental mereka dengan lebih optimis dan bersemangat, serta memberikan sumber daya yang dapat membantu mereka dalam proses pemulihan.</span
          >
          <a href="#" class="see-more">Tutup</a>
        </p>
        <div class="btn-container">
          <a href="{{ route('ayo-semangat') }}" class="coba-btn">Coba Fitur</a>
        </div>
      </section>
    </div>

    <script src="{{ asset('js/script-fitur.js') }}"></script>
  </body>
</html>
