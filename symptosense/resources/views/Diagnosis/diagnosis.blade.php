<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="assets/css/diagnosis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Diagnosis</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid mx-5">
            <a class="navbar-brand symptosense" href="/">
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
                    <a class="btn btn-primary register" href="/register" role="button">Registrasi</a>
                    <a class="btn btn-primary ms-3 login" href="/login" role="button">Login</a>
                </ul>
            </div>
        </div>
    </nav>

    <div class="judul container-fluid">
        <div class="mx-5 pt-4 pb-3">
            <h5 class="text-white">Prediksi Diagnosis</h5>
        </div>
    </div>

    <div class="container mt-5">
        <div class="p-3 judul-content">
            <h5 class="mt-2 mb-2">Check Diagnosis</h5>
        </div>
        <div class="p-3 content">
            <div class="info">
                <p class="info-text">Isi gejala yang anda alami!!</p>
            </div>
            <div class="container text-center">
                <form action="">
                    <div class="row g-2">
                        <div class="col-6">
                            <select name="" id="" class="form-select">
                                <option selected disabled value="">Pilih gejala anda</option>
                                <option value="b">gejala 1</option>
                                <option value="c">gejala 2</option>
                                <option value="d">gejala 3</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select name="" id="" class="form-select">
                                <option selected disabled value="">Pilih gejala anda</option>
                                <option value="b">gejala 1</option>
                                <option value="c">gejala 2</option>
                                <option value="d">gejala 3</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <select name="" id="" class="form-select">
                                <option selected disabled value="">Pilih gejala anda</option>
                                <option value="b">gejala 1</option>
                                <option value="c">gejala 2</option>
                                <option value="d">gejala 3</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-tambah">
                                        <i class="fas fa-plus"></i> Tambah Gejala
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-hasil">
                                        <i class="fas fa-eye"></i> Lihat Hasil Gejala
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>