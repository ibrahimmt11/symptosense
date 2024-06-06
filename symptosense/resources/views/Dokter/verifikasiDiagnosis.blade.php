<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="assets/css/Dokter/verifikasiDiagnosis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Verifikasi Diagnosis</title>
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
                    <a href="/dashboardD" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-grid-alt"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="/verifikasiDiagnosis" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-clipboard"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Verifikasi Diagnosis</span>
                    </a>
                </li>
                <li class="">
                    <a href="/konsultasiD" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-support"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Konsultasi</span>
                    </a>
                </li>
                <li class="">
                    <a href="/keluhan" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-sad"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Keluhan</span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled px-2 bottom-nav">
                <li class=""><a href="/pengaturanD" class="d-flex align-items-center sidebar-link py-3"><i class="fs-2 lni lni-cog"></i>
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
                                    <div>
                                        {{ Auth::user()->name }}
                                        <br>Pasien
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container mt-5 mb-4">
                <div class="p-4 table-box d-flex align-item-center judul">
                    <i class="fs-2 lni lni-clipboard"></i>
                    <span class="">Verifikasi Diagnosis</span>
                </div>
            </div>

            <div class="container mt-5 mb-5">
                <div class="p-3 table-box">
                    <form class="d-flex" role="search" id="search">
                        <input class="form-control me-2" type="search" placeholder="Search History">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <div class="container mt-3">
                        <div class="p-3 judul-content-table">
                            <h5 class="mt-3 mb-2">History Diagnosis Yang sudah di confirm dan siap konsultasi</h5>
                        </div>
                    </div>
                    <div class="container">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Pasien</th>
                                    <th scope="col">ID Diagnosis</th>
                                    <th scope="col">Hasil Diagnosis AI</th>
                                    <th scope="col">Diagnosis Dokter</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($consultations->isEmpty())
                                    <tr>
                                        <td colspan="6" class="btn btn-primary">Belum ada history diagnosis.</td>
                                    </tr>
                                @else
                                    @foreach($consultations as $consultation)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td>{{ $consultation->nama_lengkap }}</td>
                                            <td>{{ $consultation->id_diagnosis }}</td>
                                            <td>{{ $consultation->hasil_diagnosis }}</td>
                                            <td data-gejala="{{ $consultation->gejala_terpilih }}">{{ $consultation->diagnosis_dokter }}</td>
                                            <td>
                                                <button type="button" class="btn btn-verif" data-bs-toggle="modal" data-bs-target="#detail">Details</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--Modal-->
            <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailsModalLabel">Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container mb-5">
                                <div class="information">
                                    <form>
                                        <div class="p-3 row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nama" style="font-weight: bold;">Nama pasien</label>
                                                    <input type="text" class="form-control" id="nama" value="{{ $consultation->nama_lengkap }}" readonly>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="" style="font-weight: bold;">Keluhan</label>
                                                    <div class="complaint-list">
                                                        <div class="list-group">
                                                            @foreach(json_decode($consultation->gejala_terpilih) as $symptom)
                                                                <a href="#" class="list-group-item">{{ $symptom }}</a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="" style="font-weight: bold;">Diagnosis (Jika tidak verifikasi)</label>
                                                    <div class="mb-3">
                                                        <input type="file" class="form-control" id="bukti" name="bukti" accept=".pdf, .jpg, .png" aria-describedby="fileHelp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" style="font-weight: bold;">ID Diagnosis</label>
                                                    <input type="text" class="form-control" id="" value="{{ $consultation->id_diagnosis }}" readonly>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="" style="font-weight: bold;">Diagnosis AI</label>
                                                    <input type="text" class="form-control" id="" value="{{ $consultation->hasil_diagnosis }}" readonly>
                                                    
                                                    <div>
                                                        <i class="lni lni-empty-file" style="font-size: 16px;">
                                                            <span>AI_generated_diagnosis.PDF</span></i>
                                                    </div>
                                                    <div>
                                                        <select name="" id="" class="form-select">
                                                            <option value="b">Verify</option>
                                                            <option value="c">No verify</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-end mt-3">
                                                <button type="submit" class="btn btn-submit">Submit</button> <!-- Change button color as needed -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/sidenav.js"></script>
</body>

</html>