<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="assets/css/Pasien/pengaturanP.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Pengaturan</title>
</head>

<body style="background-color: #D6E4F0;">
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex flex-column justify-content-between">
                <h1 class="fs-4"><span class="bg-dark text-white rounded shadow px-2 me-2">SS</span><span class="title">Symptosense</span></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fal fa-stream"></i></button>
            </div>

            <ul class="list-unstyled px-2 ">
                <li class="s">
                    <a href="/dashboardP" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-grid-alt"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="/diagnosisP" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-clipboard"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Diagnosis</span>
                    </a>
                </li>
                <li class="">
                    <a href="/konsultasiP" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-support"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Konsultasi</span>
                    </a>
                </li>
                <li class="">
                    <a href="riwayatP" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-spinner-arrow"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Riwayat</span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled px-2 bottom-nav">
                <li class=""><a href="/pengaturanP" class="d-flex align-items-center sidebar-link py-3"><i class="fs-2 lni lni-cog"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Pengaturan</span></a></li>
                <li class=""><a href="/login" class="d-flex align-items-center sidebar-link py-3"><i class="fs-2 lni lni-exit"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Exit</span></a></li>
            </ul>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-md">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item mx-5">
                                <a class="nav-link text-white d-flex align-items-center" aria-current="page" href="#">
                                    <i class="fs-5 lni lni-alarm"></i>
                                    <img src="assets/images/profile.png" alt="Profile Picture" class="rounded-circle me-2 profile-pic">
                                    @if(Auth::check())
                                    <div>
                                        {{ Auth::user()->name }}
                                        <br>Pasien
                                    </div>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    @if(session()->has('message'))
                    <br><br>
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="container mt-5 mb-4">
                <div class="p-4 table-box d-flex align-item-center judul">
                    <i class="fs-2 lni lni-cog"></i>
                    <span class="">Pengaturan</span>
                </div>
            </div>
            <div class="container mt-3 d-flex justify-content-between">
                <div class="col-md-8">
                    <div class="container mt-3 ">
                        <div class="p-3 judul-content-table">
                            <h5 class="mt-2 mb-2">Informasi Akun</h5>
                        </div>
                    </div>
                    <div class="container mb-5">
                        <div class="information">
                        <form action="{{ url('update-profile-pasien') }}" method="POST">
                            @csrf
                            <div class="p-3 row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="hidden" name="id_pasien" value="{{ $pasien->id_pasien }}">
                                        <input type="hidden" name="id_user" value="{{ $pasien->user_id }}">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $pasien->username }}">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="tanggalLahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" <?= $pasien->tgl_lahir != null ? 'value="'.$pasien->tgl_lahir.'"' : ''?>>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="jenisKelamin">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="jenisKelamin" name="jenisKelamin" value="{{ $pasien->jenis_kelamin }}">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="noTelp">No Telp.</label>
                                        <input type="text" class="form-control" id="noTelp" name="noTelp" value="{{ $pasien->no_telp }}">
                                    </div>
                                    <input type="checkbox" id="showPassword" onchange="showPasswordBox()"> Ubah Password
                                    <div class="mb-3" id="password-box" style="display:none;">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password anda">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $pasien->email }}">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $pasien->alamat }}</textarea>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="beratBadan">Berat Badan</label>
                                        <input type="text" class="form-control" id="beratBadan" name="beratBadan" value="{{ $pasien->berat_badan }}">
                                    </div>
                                    <div class="group">
                                        <label for="tinggiBadan">Tinggi Badan</label>
                                        <input type="text" class="form-control" id="tinggiBadan" name="tinggiBadan" value="{{ $pasien->tinggi_badan }}">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn">Save</button>
                                </div>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
                <div class="container col-md-4 mt-3">
                    <div class="profil">
                        <form>
                            <div class="p-3 text-center">
                                <div class="form-group">
                                    <label for="profilePic">
                                        <img src="assets/images/profile.png" alt="Profile Picture" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px;">
                                    </label>
                                    <input type="file" class="form-control d-none" id="profilePic">
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary">Ganti Profil</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/sidenav.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function showPasswordBox(){
            if(document.getElementById("showPassword").checked){
                $("#password").val("");
                $("#password-box").css("display","block");
            } else{
                $("#password").val("");
                $("#password-box").css("display","none");
            }
        }
    </script>
</body>

</html>