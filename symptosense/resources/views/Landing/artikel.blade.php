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
    <style>
        .card-large {
            position: relative;
            background-color: #f1f1f1;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .scroll-container {
            display: flex;
            flex-direction: column;
            height: 300px;
            overflow-y: auto;
            padding: 0 15px;
        }

        .card-small {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.2);
            /* 20% black opacity */
            border-radius: 10px;
        }

        .overlay-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
        }
    </style>
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

    <div class="container-fluid bg-primary about-us">
        <div class="row mx-5 pt-5">
            <div class="col-md-6">
                <h1 class="text-white">Temukan <strong>Solusi</strong>,<br>
                    <strong>SymptoSense</strong>, Pintu Masuk
                    Penyelamatan Berbasis <strong>AI</strong> <br>
                    untuk <strong>Kesehatanmu!</strong>
                </h1>
                <p class="text-white deskripsi">Bergabunglah dengan SymptoSense hari ini
                    untuk meramalkan kesehatanmu bersama AI!</p>
                <div>
                    <a href="/diagnosis" type="button" class="btn try-it">Try it out!</a>
                </div>
            </div>
            <div class="col-md-6 pb-5">
                <img src="assets/images/landing.png" class="img-fluid text-gambar">
            </div>
        </div>
    </div>
    <p style="margin-left:100px;margin-top:20px;font-size:32px;font-weight:500;">Artikel Terpopuler</p>
    <div class="row g-0 text-center mt-5" style="padding-left:100px;">
        <div class="col-sm-6 col-md-7">
            <img src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2024/04/05014157/Daftar-Psikiater-Terdekat-di-Jakarta.jpg.webp" style="height:380px;width:730px; border-radius: 10px;">
        </div>
        <div class="col-6 col-md-4">
            <div class="scroll-container" style="height:380px;">
                <div class="card-small">
                    <div class="row g-0">
                        <div class="col-sm-6 col-md-6">
                            <img src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2024/06/03020509/Kenali-Jenis-Obat-Skizofernia-yang-Umumnya-Dokter-Resepkan-1-150x99.jpg.webp" style="width:160px;height:100px;border-radius: 10px;">
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="row">
                                <div class="col-12 text-start">
                                    <p style="font-size:13px;font-weight:bold;">Kenali Jenis Obat Skizofrenia yang Umumnya Dokter Resepkan</p>
                                </div>
                                <div class="col-12 text-start" style="background-color: #1e56a0;border-radius:7px;width:150px;margin-left:10px;height:35px;">
                                    <p style="font-size:12px;margin-top:8px;margin-left:10px;color:white;">Kesehatan Mental</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-small">
                    <div class="row g-0">
                        <div class="col-sm-6 col-md-6">
                            <img src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2024/05/28063350/Mengenal-Intrusive-Thought-Pikiran-Menganggu-yang-Datang-Tiba-Tiba-150x99.jpg.webp" style="width:160px;height:100px;border-radius: 10px;">
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="row">
                                <div class="col-12 text-start">
                                    <p style="font-size:13px;font-weight:bold;">Mengenal Intrusive Thoughts, Pikiran Mengganggu yang Datang Tiba-Tiba</p>
                                </div>
                                <div class="col-12 text-start" style="background-color: #1e56a0;border-radius:7px;width:150px;margin-left:10px;height:35px;">
                                    <p style="font-size:12px;margin-top:8px;margin-left:10px;color:white;">Kesehatan Mental</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-small">
                    <div class="row g-0">
                        <div class="col-sm-6 col-md-6">
                            <img src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2024/05/28062155/Mengenal-FOPO-Fear-of-Other-Peoples-Opinions-150x99.jpg.webp" style="width:160px;height:100px;border-radius: 10px;">
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="row">
                                <div class="col-12 text-start">
                                    <p style="font-size:13px;font-weight:bold;">Catat, Ini Daftar Psikolog dan Psikiater Terdekat di Jakarta.</p>
                                </div>
                                <div class="col-12 text-start" style="background-color: #1e56a0;border-radius:7px;width:150px;margin-left:10px;height:35px;">
                                    <p style="font-size:12px;margin-top:8px;margin-left:10px;color:white;">Kesehatan Mental</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-small">
                    <div class="row g-0">
                        <div class="col-sm-6 col-md-6">
                            <img src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2024/05/28021423/Rekomendasi-Psikolog-dan-Psikiater-di-Halodoc-150x99.jpg.webp" style="width:160px;height:100px;border-radius: 10px;">
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="row">
                                <div class="col-12 text-start">
                                    <p style="font-size:13px;font-weight:bold;">Mengenal FOPO, Fear of Other People's Opinions</p>
                                </div>
                                <div class="col-12 text-start" style="background-color: #1e56a0;border-radius:7px;width:150px;margin-left:10px;height:35px;">
                                    <p style="font-size:12px;margin-top:8px;margin-left:10px;color:white;">Kesehatan Mental</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-small">
                    <div class="row g-0">
                        <div class="col-sm-6 col-md-6">
                            <img src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/10/03055716/Ini-Pilihan-Obat-Penenang-Depresi-yang-Biasa-Diresepkan-Dokter-150x99.jpg.webp" style="width:160px;height:100px;border-radius: 10px;">
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="row">
                                <div class="col-12 text-start">
                                    <p style="font-size:13px;font-weight:bold;">Ini Pilihan Obat Penenang Depresi yang Biasa Diresepkan Dokter</p>
                                </div>
                                <div class="col-12 text-start" style="background-color: #1e56a0;border-radius:7px;width:150px;margin-left:10px;height:35px;">
                                    <p style="font-size:12px;margin-top:8px;margin-left:10px;color:white;">Kesehatan Mental</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-small">
                    <div class="row g-0">
                        <div class="col-sm-6 col-md-6">
                            <img src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2024/04/05014157/Daftar-Psikiater-Terdekat-di-Jakarta.jpg.webp" style="width:160px;height:100px;border-radius: 10px;">
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="row">
                                <div class="col-12 text-start">
                                    <p style="font-size:13px;font-weight:bold;">Catat, Ini Daftar Psikolog dan Psikiater Terdekat di Jakarta.</p>
                                </div>
                                <div class="col-12 text-start" style="background-color: #1e56a0;border-radius:7px;width:150px;margin-left:10px;height:35px;">
                                    <p style="font-size:12px;margin-top:8px;margin-left:10px;color:white;">Kesehatan Mental</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <footer class="text-white pt-5 pb-4">
            <div class="container text-center text-md-left">
                <div class="row text-center text-md-left">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weigth-bold">Symptosense</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weigth-bold">Product</h5>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weigth-bold">Usefull link</h5>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weigth-bold">Contact</h5>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>

</html>