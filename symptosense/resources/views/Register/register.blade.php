<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="assets/css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
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

    <div class="row vh-100 g-0 register">
        <!-- Kiri -->
        <div class="col-lg-6 position-relative d-none d-lg-block bg-left">
            <div class="container text-center text-white">
                <img src="assets/images/robot.png" alt="" class="img-fluid gambar">
                <h1 class="mt-5">dasddwda</h1>
                <p class="mt-3">Welcome to Symptosense</p>
            </div>
        </div>

        <!-- Kanan -->
        <div class="col-lg-6 mt-5">
            <div class="row align-item-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">
                    <a href="#" class="d-flex justify-content-center mb-4">
                        <img src="assets/images/batuk.png" alt="" width="">
                    </a>
                    <div class="text-center mb-5">
                        <h3 class="fw-bold">Buat Akun</h3>
                        <p class="text-secondary">Silakan membuat akun jika tidak punya!!</p>
                    </div>

                    <div class="d-flex justify-content-center mb-4">
                        <form class="container" style="max-width: 350px;">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama anda">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" placeholder="Masukkan email anda">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" placeholder="Masukkan password anda">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-select" aria-label="Pilih role">
                                    <option selected disabled>Pilih role</option>
                                    <option>Dokter</option>
                                    <option>Pasien</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="fileUpload" class="form-label">Bukti</label>
                                <input type="file" class="form-control" id="fileUpload" name="fileUpload" accept=".pdf, .jpg, .png" aria-describedby="fileHelp">
                                <div id="fileHelp" class="form-text">Untuk dokter dapat mengirim STR untuk pasien dapat mingirim KTP</div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 signup">Sign Up</button>
                        </form>
                    </div>
                    <div class="text-center mb-5">
                        <small>Sudah punya akun?
                            <a href="/login" class="fw-bold">Login di sini!</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>