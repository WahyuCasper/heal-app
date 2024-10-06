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
      <div class="video-container" data-url="https://youtu.be/wIiUxN5sE7Y">
        <img
          class="video-thumbnail"
          src="https://img.youtube.com/vi/wIiUxN5sE7Y/maxresdefault.jpg"
          alt="Video Thumbnail"
        />
        <div class="video-overlay">
          <span class="play-icon">▶</span>
        </div>
      </div>

      <!-- Video Kedua -->
      <div class="video-container" data-url="https://youtu.be/YX92REB68vI">
        <img
          class="video-thumbnail"
          src="aset/image1.png"
          alt="Video Thumbnail"
        />
        <div class="video-overlay">
          <span class="play-icon">▶</span>
        </div>
      </div>

      <!-- Video Ketiga -->
      <div class="video-container" data-url="https://youtu.be/Dx112W4i5I0">
        <img
          class="video-thumbnail"
          src="https://img.youtube.com/vi/Dx112W4i5I0/maxresdefault.jpg"
          alt="Video Thumbnail"
        />
        <div class="video-overlay">
          <span class="play-icon">▶</span>
        </div>
      </div>

      <!-- Video Keempat -->
      <div class="video-container" data-url="https://youtu.be/X_HNPon8Z04">
        <img
          class="video-thumbnail"
          src="https://img.youtube.com/vi/X_HNPon8Z04/maxresdefault.jpg"
          alt="Video Thumbnail"
        />
        <div class="video-overlay">
          <span class="play-icon">▶</span>
        </div>
      </div>

      <!-- Video Kelima -->
      <div class="video-container" data-url="https://vt.tiktok.com/ZS2SSJs9X/">
        <img
          class="video-thumbnail"
          src="aset/image2.png"
          alt="Video Thumbnail"
        />
        <div class="video-overlay">
          <span class="play-icon">▶</span>
        </div>
      </div>
      

      <!-- Video Keenam -->
      <div class="video-container" data-url="https://vt.tiktok.com/ZS2SBWHWW/">
        <img
          class="video-thumbnail"
          src="aset/image3.png"
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
