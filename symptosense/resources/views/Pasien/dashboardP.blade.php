<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="assets/css/Pasien/dashboardP.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dashboard</title>
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
                    <a href="/riwayatP" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-spinner-arrow"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Riwayat</span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled px-2 bottom-nav">
                <li class=""><a href="/pengaturanP" class="d-flex align-items-center sidebar-link py-3"><i class="fs-2 lni lni-cog"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Pengaturan</span></a></li>
                <li class="">
                    <a href="{{ route('logout') }}" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-exit"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Logout</span>
                    </a>
                </li>
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


            <div class="row gl-2">
                <div class="dashboard-content px-3 pt-4 w-100 d-flex">
                    <div class="content-box d-flex align-items-center col-3">
                        <img src="{{ asset('assets/images/Konsul.png') }}" alt="Gambar" class="img-fluid me-3">
                        <div class="text-content">
                            <h2 class="title">Total Konsultasi</h2>
                            <h2>{{ $totalConsultations }}x</h2>
                            <p class="description">{{ $totalConsultations }} Macam dokter</p>
                        </div>
                    </div>
                    <div class="content-box d-flex align-items-center col-3">
                        <img src="{{ asset('assets/images/diagnosis.png') }}" alt="Gambar" class="img-fluid me-3">
                        <div class="text-content">
                            <h2 class="title">Total Diagnosis</h2>
                            <h2>{{ $totalDiagnoses }}x</h2>
                            <p class="description">{{ $totalDiagnoses }} Macam jenis penyakit</p>
                        </div>
                    </div>
                    <div class="content-box d-flex align-items-center col-3">
                        <img src="{{ asset('assets/images/diagnosis.png') }}" alt="Gambar" class="img-fluid me-3">
                        <div class="text-content">
                            <h2 class="title">Menunggu Verifikasi</h2>
                            <h2 class="fs-5s">{{ $pendingDiagnoses }} Diagnosis</h2>
                            <p class="description">{{ $pendingDiagnoses }} data menunggu verifikasi dokter</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Container for Jitsi Meet -->
            <div id="jitsi-container"></div>

            <div class="container mt-4 mb-5">
                <div class="p-3 table-box">
                    <form class="d-flex" role="search" id="search">
                        <input class="form-control me-2" type="search" placeholder="Search History">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <div class="container mt-3">
                        <div class="p-3 judul-content">
                            <h5 class="mt-2 mb-2">History Diagnosis Yang sudah di confirm dan siap konsultasi</h5>
                        </div>
                    </div>
                    <div class="container">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Dokter</th>
                                    <th scope="col">ID Diagnosis</th>
                                    <th scope="col">Hasil Diagnosis AI</th>
                                    <th scope="col">Hasil Konsultasi</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($consultations->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada history diagnosis.</td>
                                    </tr>
                                @else
                                    @foreach($consultations as $consultation)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td>{{ $consultation->nama_lengkap }}</td>
                                            <td>{{ $consultation->id_diagnosis }}</td>
                                            <td>{{ $consultation->hasil_diagnosis }}</td> <!-- Assuming a static file for demonstration -->
                                            <td>{{ $consultation->diagnosis_dokter }}</td>
                                            <td>
                                                @if($consultation->status === 'completed')
                                                    <span class="badge badge-success">Completed</span>
                                                @elseif($consultation->meeting_status === 'scheduled')
                                                    <button class="btn btn-primary" onclick="showIframe('{{ $consultation->meeting_link }}')">Join Meeting</button>
                                                @elseif($consultation->meeting_status === 'active')
                                                    <button class="btn btn-success" onclick="showIframe('{{ $consultation->meeting_link }}')">Join Active Meeting</button>
                                                @else
                                                    <span class="badge badge-secondary" style="color: black">No Meeting Scheduled</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        function openJitsiMeeting() {
            const roomName = 'meeting_' + new Date().getTime(); // Example room name, generate as needed
            const url = 'https://meet.jit.si/' + roomName;
            window.open(url, '_blank');
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/sidenav.js"></script>
    <script src="https://meet.jit.si/external_api.js"></script>
    <script src="{{ asset('js/jitsi.js') }}"></script>
</body>

</html>
