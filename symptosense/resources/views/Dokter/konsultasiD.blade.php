<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="assets/css/Dokter/konsultasiD.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Konsultasi</title>
    <style>
        /* Initially hide the iframe */
        #meetingIframe {
            display: none;
            border: none;
            /* Optional: Remove default iframe border */
        }
    </style>
</head>

<body style="background-color: #D6E4F0;">
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex flex-column justify-content-between">
                <h1 class="fs-4"><span class="bg-dark text-white rounded shadow px-2 me-2">SS</span><span
                        class="title">Symptosense</span></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i
                        class="fal fa-stream"></i></button>
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
                <li class=""><a href="/pengaturanD" class="d-flex align-items-center sidebar-link py-3"><i
                            class="fs-2 lni lni-cog"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Pengaturan</span></a></li>
                <li class=""><a href="/login" class="d-flex align-items-center sidebar-link py-3"><i
                            class="fs-2 lni lni-exit"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Exit</span></a></li>
            </ul>
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-md">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                            <li class="nav-item mx-5">
                                <a class="nav-link text-white d-flex align-items-center" aria-current="page"
                                    href="#">
                                    <i class="fs-5 lni lni-alarm"></i>
                                    <img src="{{ asset($dokter->profile_picture) }}" alt="Profile Picture"
                                        class="rounded-circle me-2 profile-pic">
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
                    <i class="fs-2 lni lni-support"></i>
                    <span class="">Konsultasi</span>
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
                            <h5 class="mt-2 mb-2">History Diagnosis Yang sudah di confirm dan siap konsultasi</h5>
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
                                @php
                                    $currentPage = request()->has('page') ? request()->get('page') : 1;
                                    $startIndex = ($currentPage - 1) * 5;
                                    $endIndex = $startIndex + 4;
                                @endphp
                                @forelse($consultations->slice($startIndex, 5) as $consultation)
                                    <tr>
                                        <th scope="row">{{ $loop->index + $startIndex + 1 }}</th>
                                        <td>{{ $consultation->nama_lengkap }}</td>
                                        <td>{{ $consultation->id_diagnosis }}</td>
                                        <td>{{ $consultation->hasil_diagnosis }}</td>
                                        <td>{{ $consultation->diagnosis_dokter }}</td>
                                        <td>
                                            @if ($consultation->status === 'active')
                                                <button class="btn btn-success"
                                                    onclick="showIframe('{{ $consultation->meeting_link }}')">Join
                                                    Meeting</button>
                                            @elseif($consultation->status === 'completed' || $consultation->status === 'Completed')
                                                <span class="text-success">Completed</span>
                                            @else
                                                <button class="btn btn-primary"
                                                    onclick="showIframe('{{ route('meetings.start', ['id_diagnosis' => $consultation->id_diagnosis]) }}')">Start
                                                    Meeting</button>
                                                <form
                                                    action="{{ route('consultations.complete', ['id_diagnosis' => $consultation->id_diagnosis]) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-secondary"
                                                        onclick="markAsCompleted()">Mark as Completed</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="btn btn-primary">Belum ada history diagnosis.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            <nav aria-label="Pagination">
                                <ul class="pagination">
                                    <!-- Previous Button -->
                                    <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                        <a class="page-link"
                                            href="{{ $currentPage == 1 ? '#' : '?page=' . ($currentPage - 1) }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>

                                    <!-- Page Numbers -->
                                    @php
                                        $totalPages = ceil($consultations->count() / 5);
                                        $startPage = max(1, $currentPage - 2);
                                        $endPage = min($totalPages, $startPage + 4);
                                        $startPage = max(1, $endPage - 4);
                                    @endphp

                                    @for ($page = $startPage; $page <= $endPage; $page++)
                                        <li class="page-item {{ $currentPage == $page ? 'active' : '' }}">
                                            <a class="page-link"
                                                href="{{ $page == 1 ? '?' : '?page=' . $page }}">{{ $page }}</a>
                                        </li>
                                    @endfor

                                    <!-- Next Button -->
                                    <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                                        <a class="page-link"
                                            href="{{ $currentPage == $totalPages ? '#' : '?page=' . ($currentPage + 1) }}"
                                            aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <iframe id="meetingIframe" width="100%" height="600px"
                        allow="camera; microphone; fullscreen"></iframe>
                    <script>
                        function showIframe(meetingLink) {
                            document.getElementById('meetingIframe').src = meetingLink;
                            document.getElementById('meetingIframe').style.display = 'block';
                        }
                    </script>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="assets/js/sidenav.js"></script>

    <script>
        function startMeeting() {
            fetch("{{ route('start.meeting', ['id_diagnosis' => $consultation->id_diagnosis]) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            }).then(response => {
                if (response.ok) {
                    console.log('Meeting started');
                } else {
                    console.log('Failed to start meeting');
                }
            });
        }

        function markAsCompleted() {
            fetch("{{ route('start.meeting', ['id_diagnosis' => $consultation->id_diagnosis]) }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            }).then(response => {
                if (response.ok) {
                    console.log('Meeting marked as completed');
                    setTimeout(function() {
                        // Logic to hide the notification after 30 seconds
                        document.getElementById('notification-message').style.display = 'none';
                        document.getElementById('alarm-icon').classList.remove('new-notification');
                    }, 10000); // 30 seconds delay
                } else {
                    console.log('Failed to mark meeting as completed');
                }
            });
        }
    </script>

</body>

</html>
