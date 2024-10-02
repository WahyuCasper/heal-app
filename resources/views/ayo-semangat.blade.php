<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/ayo-semangat.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Ayo Semangat|HEAL</title>
  </head>
  <body>
    <div class="card">
      <h1>Rekomendasi Tontonan</h1>

      <!-- Video Pertama -->
      <div class="video-container" data-url="https://youtu.be/yjnSX_iUFVo">
        <img
          class="video-thumbnail"
          src="https://img.youtube.com/vi/yjnSX_iUFVo/maxresdefault.jpg"
          alt="Video Thumbnail"
        />
        <div class="video-overlay">
          <span class="play-icon">▶</span>
        </div>
      </div>

      <!-- Video Kedua -->
      <div class="video-container" data-url="https://youtu.be/9hjMIOIysng">
        <img
          class="video-thumbnail"
          src="https://img.youtube.com/vi/9hjMIOIysng/maxresdefault.jpg"
          alt="Video Thumbnail"
        />
        <div class="video-overlay">
          <span class="play-icon">▶</span>
        </div>
      </div>

      <!-- Video Ketiga -->
      <div class="video-container" data-url="https://youtu.be/YIza-jl2Kcs">
        <img
          class="video-thumbnail"
          src="https://img.youtube.com/vi/YIza-jl2Kcs/maxresdefault.jpg"
          alt="Video Thumbnail"
        />
        <div class="video-overlay">
          <span class="play-icon">▶</span>
        </div>
      </div>

      <!-- Video Keempat -->
      <div class="video-container" data-url="https://youtu.be/HB8vftGxsIc">
        <img
          class="video-thumbnail"
          src="https://img.youtube.com/vi/HB8vftGxsIc/maxresdefault.jpg"
          alt="Video Thumbnail"
        />
        <div class="video-overlay">
          <span class="play-icon">▶</span>
        </div>
      </div>

      <!-- Video Kelima -->
      <div class="video-container" data-url="https://youtu.be/dBFp0Ext0y8">
        <img
          class="video-thumbnail"
          src="https://img.youtube.com/vi/dBFp0Ext0y8/maxresdefault.jpg"
          alt="Video Thumbnail"
        />
        <div class="video-overlay">
          <span class="play-icon">▶</span>
        </div>
      </div>

      <!-- Video Keenam -->
      <div class="video-container" data-url="https://youtu.be/yQovgGalYGo">
        <img
          class="video-thumbnail"
          src="https://img.youtube.com/vi/yQovgGalYGo/maxresdefault.jpg"
          alt="Video Thumbnail"
        />
        <div class="video-overlay">
          <span class="play-icon">▶</span>
        </div>
      </div>
    </div>

    <script>
      // Menambahkan event listener ke setiap video-container
      document.querySelectorAll(".video-container").forEach((container) => {
        container.addEventListener("click", () => {
          const url = container.getAttribute("data-url");
          window.open(url, "_blank");
        });
      });
    </script>
  </body>
</html>
