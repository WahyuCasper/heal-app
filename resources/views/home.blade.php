<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home|HEAL</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <div class="container">
        <a href="#" class="logo-heal">
          <img
            src="aset/Logo Heal.svg"
            loading="lazy"
            width="60"
            class="logoheal"
          />
        </a>
        <h1>HEAL</h1>
        <div class="hamburger-menu" id="hamburger-menu">&#9776;</div>
        <nav id="nav-links">
          <a href="#home">Beranda</a>
          <a href="#services">Keunggulan</a>
          <a href="{{ route('tentang-kami') }}">Tentang Kami</a>
          <a class="btn-mulai" href="{{ route('feature') }}">Mulai Sekarang</a>
          <div class="hide-button" id="hide-button">&#10006;</div>
        </nav>
      </div>
    </header>

    <section id="home" class="hero">
          <div class="hero-content">
            <div class="grid-hero">
              <div class="column1">
                <h2 class="hero-h2"><span style="color: #4cddeb">Kesehatan Mental</span> itu Penting</h2>
                <p class="hero-p">
                  HEAL, sebuah platform berbasis machine learning yang dirancang untuk
                  membantu Anda mendeteksi dan merinci kesehatan mental Anda.
                </p>
                <div class="container-btn">
                  <a href="{{ route('feature') }}" class="cta-button">Jelajahi Fitur</a>
                </div>
              </div>
              <div class="column2">
                <img
                src="aset/Heal-Image.svg"
                alt="Ilustrasi Kesehatan Mental"
                class="hero-image"
              />
              </div>
            </div>
          </div>
    </section>

    <section id="services" class="services">
      <div class="container-services">
      <h2>Kenapa Harus <span style="color: #4cddeb">HEAL</span>?</h2>
      <div class="features-grid">
        <div class="feature-item">
          <i class="fa fa-brain"></i>
          <h3>Deteksi Berbasis AI</h3>
          <p>
            Memanfaatkan algoritma pembelajaran mesin tingkat lanjut untuk mendeteksi
            kondisi kesehatan mental secara dini.
          </p>
        </div>
        <div class="feature-item">
          <i class="fa fa-user-secret"></i>
          <h3>Anonim & Aman</h3>
          <p>
            Privasi Anda adalah prioritas utama kami. Semua penilaian dilakukan secara
            anonim dan aman.
          </p>
        </div>
        <div class="feature-item">
          <i class="fa fa-heart"></i>
          <h3>Gratis</h3>
          <p>
            HEAL sepenuhnya gratis untuk pelajar dan dewasa muda, memastikan
            semua orang memiliki akses ke bantuan yang mereka butuhkan.
          </p>
        </div>
      </div>
    </section>

    <section id="rating" class="rating">
      <h2><span style="color: pink">Ulasan</span> & Penilaian</h2>
      <!-- Tampilkan rata-rata rating -->
      <div class="rating-summary">
        <div class="stars">
          <h3 class="h3-average">{{ $averageRating }}</h3>
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $averageRating)
                    <!-- Bintang penuh -->
                    <i class="fas fa-star" style="color: gold;"></i>
                @else
                    <!-- Bintang kosong -->
                    <i class="far fa-star" style="color: gold;"></i>
                @endif
            @endfor
        </div>
      </div>
      <div class="container-flex-review">
      <div class="reviews-container">
        @if($ratings->isEmpty())
            <p>Belum ada rating.</p>
        @else
            @foreach($ratings as $rating)
                <div class="review-card">
                    <div class="review-header">
                        <strong class="nama-pengguna">{{ $rating->name }}</strong>
                        <div class="bintang-pengguna">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $rating->rating)
                                    <!-- Bintang penuh -->
                                    <i class="fas fa-star" style="color: gold;"></i>
                                @else
                                    <!-- Bintang kosong -->
                                    <i class="far fa-star" style="color: gold;"></i>
                                @endif
                            @endfor
                        </div>
                    </div>
                    <div class="review-body">
                        <div class="komen-pengguna">{!! $rating->comment !!}</div>
                    </div>
                </div>
            @endforeach
        @endif
      </div>
      </div>
    </section>
        
    <footer>
      <div class="footer-content">
        <p>&copy; 2024 Heal. All rights reserved.</p>
        <div class="social-media">
          <a href="https://www.instagram.com/pkmrsh_heal?igsh=dGg0Nmw5cGg3enNs" aria-label="Instagram"><i class="fa-brands fa-instagram"></i> Instagram</a>
        </div>
      </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
  </body>
</html>
