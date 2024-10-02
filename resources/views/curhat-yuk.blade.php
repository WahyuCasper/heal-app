<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curhat Yuk|HEAL</title>
    <link rel="stylesheet" href="{{ asset('css/curhat-yuk.css') }}" />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="card">
    <h1>Hubungi Kami di WhatsApp</h1>
    <p>Nomor WhatsApp: 
      <a href="https://wa.me/6285346809488" target="_blank">
        <strong>+62 853-4680-9488</strong>
      </a>
    </p>
    <a class="whatsapp-link" href="https://wa.me/6285346809488" target="_blank">Chat di WhatsApp</a>
</div>


@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

</body>
</html>
