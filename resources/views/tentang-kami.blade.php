<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | HEAL</title>
    <link rel="stylesheet" href="{{ asset('css/tentang-kami.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
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
        <nav id="nav-links" class="nav-closed">
          <a href="{{ route('home') }}">Beranda</a>
          <a href="{{ route('home') }}">Keunggulan</a>
          <a href="#about">Tentang Kami</a>
          <a class="btn-mulai" href="{{ route('feature') }}">Mulai Sekarang</a>
          <div class="hide-button" id="hide-button">&#10006;</div>
        </nav>
      </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
      <div class="hero-content">
        <p>
          HEAL adalah platform berbasis teknologi machine learning untuk mendeteksi dan memberikan solusi kesehatan mental
          secara anonim dan gratis untuk generasi muda Indonesia, dan diharapkan dapat mencegah meningkatnya angka bunuh diri pada remaja.
        </p>
      </div>
    </section>

    <!-- Timeline Section -->
    <div class="container-section">
      <div class="wrap-timeline">
        <h2>Rangkuman Kegiatan</h2>
        <section class="section-timeline">
          <div class="timeline-container">
            <div class="timeline">
              <div class="timeline-item">
                <div class="card">
                  <img src="aset\Perancangan.jpg" alt="Bulan 1" />
                  <div class="card-content">
                    <h3>Bulan 1</h3>
                    <p>
                      Tahapan pembuatan website ini diawali dengan diskusi mengenai timeline kegiatan dan prototype <br/>desain website HEAL.
                    </p>
                  </div>
                </div>
                <div class="timeline-point"></div>
              </div>
      
              <div class="timeline-item">
                <div class="card">
                  <img src="aset\Pengembangan.jpg" alt="Bulan 2" />
                  <div class="card-content">
                    <h3>Bulan 2</h3>
                    <p>
                      Website HEAL mulai dibuat dan dijalankan. Setiap kemajuan didiskusikan terkait dengan <br/>sistemnya, hingga selesai.
                    </p>
                  </div>
                </div>
                <div class="timeline-point"></div>
              </div>
      
              <div class="timeline-item">
                <div class="card">
                  <img src="aset\Final.jpg" alt="Bulan 3" />
                  <div class="card-content">
                    <h3>Bulan 3</h3>
                    <p>
                      Website HEAL sudah selesai dibuat dan diuji coba pada mahasiswa yang memiliki gejala depresi serta dilakukan validasi untuk penyusunan hasil riset.   
                    </p>
                  </div>
                </div>
                <div class="timeline-point"></div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <!-- Tentang Kami Section -->
    <div class="container-section">
      <div class="team-section">
        <h2>Tentang Tim</h2>
        <div class="team-container">

          {{-- wahyu --}}
          <div class="team-card">
            <div class="card-front">
              <div class="image-container">
                <img
                  class="img-team"
                  src="aset\Wahyu Pratama Lasaleng.svg"
                  alt="Wahyu Lasaleng"
                />
                <div class="gradient-overlay"></div>
                <div class="name-overlay">Wahyu Pratama <br/>Lasaleng</div>
              </div>
            </div>
            <div class="card-back">
              <h2>Wahyu Pratama <br/>Lasaleng</h2>
              <h3>Ketua Tim</h3>
            </div>
          </div>

          {{-- ibu siti --}}
          <div class="team-card">
            <div class="card-front">
              <div class="image-container">
                <img
                  class="img-team"
                  src="aset\Siti Nurmardia Abdussamad.svg"
                  alt="Siti Nurmardia Abdussamad"
                />
                <div class="gradient-overlay"></div>
                <div class="name-overlay">Siti Nurmardia <br/>Abdussamad</div>
              </div>
            </div>
            <div class="card-back">
              <h2>Siti Nurmardia <br/>Abdussamad</h2>
              <h3>Dosen Pendamping</h3>
            </div>
          </div>

          
          {{-- ka iswan --}}
          <div class="team-card">
            <div class="card-front">
              <div class="image-container">
                <img
                  class="img-team"
                  src="aset\Mohamad Iswanto Rahman.svg"
                  alt="Mohamad Iswanto Rahman"
                />
                <div class="gradient-overlay"></div>
                <div class="name-overlay">Mohamad <br/>Iswanto Rahman</div>
              </div>
            </div>
            <div class="card-back">
              <h2>Mohamad <br/>Iswanto Rahman</h2>
              <h3>Anggota Tim</h3>
            </div>
          </div>

          {{-- ka nanad --}}
          <div class="team-card">
            <div class="card-front">
              <div class="image-container">
                <img
                  class="img-team"
                  src="aset\Nadya Pratiwi Doholio.svg"
                  alt="Nadya Pratiwi Doholio"
                />
                <div class="gradient-overlay"></div>
                <div class="name-overlay">
                  Nadya Pratiwi<br />
                  Doholio
                </div>
              </div>
            </div>
            <div class="card-back">
              <h2>Nadya Pratiwi <br/>Doholio</h2>
              <h3>Anggota Tim</h3>
            </div>
          </div>

          {{-- ayu --}}
          <div class="team-card">
            <div class="card-front">
              <div class="image-container">
                <img
                  class="img-team"
                  src="aset\Putu Ayu Indah Nazwa Usia.svg"
                  alt="Putu Ayu Indah Nazwa Usia"
                />
                <div class="gradient-overlay"></div>
                <div class="name-overlay">Putu Ayu Indah <br/>Nazwa Usia</div>
              </div>
            </div>
            <div class="card-back">
              <h2>Putu Ayu Indah <br/>Nazwa Usia</h2>
              <h3>Anggota Tim</h3>
            </div>
          </div>

           {{-- ka au --}}
          <div class="team-card">
            <div class="card-front">
              <div class="image-container">
                <img
                  class="img-team"
                  src="aset\Dwi Putri Juniar Adam.svg"
                  alt="Dwi Putri Juniar Adam"
                />
                <div class="gradient-overlay"></div>
                <div class="name-overlay">Dwi Putri <br />Juniar Adam</div>
              </div>
            </div>
            <div class="card-back">
              <h2>Dwi Putri <br/>Juniar Adam</h2>
              <h3>Anggota Tim</h3>
            </div>
          </div>

        </div>
      </div>
    </div>

    <footer>
      <div class="footer-content">
        <p>&copy; 2024 HEAL. All rights reserved.</p>
        <div class="social-media">
          <a
            href="https://www.instagram.com/pkmrsh_heal?igsh=dGg0Nmw5cGg3enNs"
            aria-label="Instagram"
            ><i class="fa-brands fa-instagram"></i> Instagram</a
          >
        </div>
      </div>
    </footer>

    <script src="{{ asset('js/tentang-kami.js') }}"></script>
  </body>
</html>
