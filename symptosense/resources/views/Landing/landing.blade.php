<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
  <link rel="stylesheet" href="assets/css/landing.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <title>Landing</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid mx-5">
      <a class="navbar-brand symptosense" href="#">
        <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        Symptosense
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Obat & vitamin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Diagnosis</a>
          </li>
        </ul>
        <ul class="mb-2 mb-lg-0">
          <a class="btn btn-primary register" href="#" role="button">Registrasi</a>
          <a class="btn btn-primary ms-3 login" href="#" role="button">Login</a>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid bg-primary about-us">
    <div class="row mx-5 pt-5">
      <div class="col-md-6">
        <h1 class="text-white">Temukan <strong>Solusi</strong>,<br>
          <strong>SymtoSense</strong>, Pintu Masuk
          Penyelamatan Berbasis <strong>AI</strong> <br>
          untuk <strong>Kesehatanmu!</strong>
        </h1>
        <p class="text-white deskripsi">Bergabunglah dengan SymtoSense hari ini
          untuk meramalkan kesehatanmu bersama AI!</p>
        <div>
          <button type="button" class="btn try-it">Try it out!</button>
        </div>
      </div>
      <div class="col-md-6 pb-5">
        <img src="assets/images/landing.png" class="img-fluid text-gambar">
      </div>
    </div>
  </div>
  </div>

  <div class="row pt-5 mx-5">
    <div class="col-md-6">
      <p class="artikel pt-4">Artikel terbaru</p>
    </div>
    <div class="col-md-6 text-end">
      <p class="artikel pt-4 lihat-semua">Lihat semua</p>
    </div>
    <div class="container pt-3 ms-md-auto">
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <img src="assets/images/gatal.png" class="card-img-top" alt="Placeholder Image">
            <div class="card-body">
              <h5 class="card-title">Gatal hingga Infeksi Kulit, Awas Gejala Eksim</h5>
              <p class="card-text">Dari banyaknya penyakit yang bisa menyerang kulit....</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Placeholder Image">
            <div class="card-body">
              <h5 class="card-title">Card 2</h5>
              <p class="card-text">Ini adalah deskripsi dari card 2.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Placeholder Image">
            <div class="card-body">
              <h5 class="card-title">Card 3</h5>
              <p class="card-text">Ini adalah deskripsi dari card 3.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Placeholder Image">
            <div class="card-body">
              <h5 class="card-title">Card 4</h5>
              <p class="card-text">Ini adalah deskripsi dari card 4.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


</body>

</html>