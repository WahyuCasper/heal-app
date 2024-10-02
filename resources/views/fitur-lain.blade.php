<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/fitur-lain.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Fitur|HEAL</title>
  </head>
  <body>
    <div class="card">
      <h1>Rekomendasi</h1>
      <div class="btn-container">
        <a href="{{ route('curhat-yuk') }}" class="btn">Curhat Yuk</a>
      </div>
      <div class="btn-container">
        <a href="{{ route('ayo-semangat') }}" class="btn">Ayo Semangat</a>
      </div>
      <div class="btn-container">
        <a href="{{ route('home') }}" class="btn"><i class="fas fa-home"></i> Beranda</a>
      </div>
    </div>
  </body>
</html>
