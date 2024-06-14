<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="assets/css/Dokter/verifikasiDiagnosis.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Verifikasi Diagnosis</title>
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
                                        <td data-gejala="{{ $consultation->gejala_terpilih }}">
                                            {{ $consultation->diagnosis_dokter }}</td>
                                        <td>
                                            @php
                                                $diagnosisStatus = DB::table('diagnosis')
                                                    ->where('id_diagnosis', $consultation->id_diagnosis)
                                                    ->value('status');
                                            @endphp

                                            @if ($diagnosisStatus == 'verified')
                                                <button type="button" class="btn btn-success"
                                                    id="detailButton-{{ $consultation->id_diagnosis }}"
                                                    data-bs-toggle="modal" data-bs-target="#detailModal"
                                                    data-nama="{{ $consultation->nama_lengkap }}"
                                                    data-id="{{ $consultation->id_diagnosis }}"
                                                    data-diagnosis="{{ $consultation->hasil_diagnosis }}"
                                                    data-gejala="{{ json_encode($consultation->gejala_terpilih) }}">Verified</button>
                                            @elseif ($diagnosisStatus == 'not verified')
                                                <button type="button" class="btn btn-warning"
                                                    id="detailButton-{{ $consultation->id_diagnosis }}"
                                                    data-bs-toggle="modal" data-bs-target="#detailModal"
                                                    data-nama="{{ $consultation->nama_lengkap }}"
                                                    data-id="{{ $consultation->id_diagnosis }}"
                                                    data-diagnosis="{{ $consultation->hasil_diagnosis }}"
                                                    data-gejala="{{ json_encode($consultation->gejala_terpilih) }}">Not
                                                    Verified</button>
                                            @else
                                                <button type="button" class="btn btn-primary"
                                                    id="detailButton-{{ $consultation->id_diagnosis }}"
                                                    data-bs-toggle="modal" data-bs-target="#detailModal"
                                                    data-nama="{{ $consultation->nama_lengkap }}"
                                                    data-id="{{ $consultation->id_diagnosis }}"
                                                    data-diagnosis="{{ $consultation->hasil_diagnosis }}"
                                                    data-gejala="{{ json_encode($consultation->gejala_terpilih) }}">Details</button>
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
                </div>
            </div>

            <!--Modal-->
            <!-- <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailsModalLabel">Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container mb-5">
                                <div class="information">
                                    @foreach ($consultations as $consultation)
<form>
                                            <div class="p-3 row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="nama" style="font-weight: bold;">Nama
                                                            pasien</label>
                                                        <input type="text" class="form-control" id="nama"
                                                            value="{{ $consultation->nama_lengkap }}" readonly>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for=""
                                                            style="font-weight: bold;">Keluhan</label>
                                                        <div class="complaint-list">
                                                            <div class="list-group">
                                                                @if ($consultation->gejala_terpilih)
@foreach (json_decode($consultation->gejala_terpilih) as $symptom)
<a href="#"
                                                                            class="list-group-item">{{ $symptom }}</a>
@endforeach
@else
<p>No symptoms available.</p>
@endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="" style="font-weight: bold;">Diagnosis
                                                            (Jika tidak verifikasi)
</label>
                                                        <div class="mb-3">
                                                            <input type="file" class="form-control" id="bukti"
                                                                name="bukti" accept=".pdf, .jpg, .png"
                                                                aria-describedby="fileHelp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="" style="font-weight: bold;">ID
                                                            Diagnosis</label>
                                                        <input type="text" class="form-control" id=""
                                                            value="{{ $consultation->id_diagnosis }}" readonly>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="" style="font-weight: bold;">Diagnosis
                                                            AI</label>
                                                        <input type="text" class="form-control" id=""
                                                            value="{{ $consultation->hasil_diagnosis }}" readonly>
                                                        <div>
                                                            <i class="lni lni-empty-file" style="font-size: 16px;">
                                                                <span>AI_generated_diagnosis.PDF</span>
                                                            </i>
                                                        </div>
                                                        <div>
                                                            <select name="" id=""
                                                                class="form-select">
                                                                <option value="b">Verify</option>
                                                                <option value="c">No verify</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-end mt-3">
                                                    <button type="submit" class="btn btn-submit">Submit</button>
                                                     Change button color as needed
                                                </div>
                                            </div>
                                        </form>
@endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Modal Structure -->
            <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container mb-5">
                                <div class="information">
                                    <div class="p-3 row">
                                        <form class="p-3 row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="modalNama" style="font-weight: bold;">Nama
                                                        pasien</label>
                                                    <input type="text" class="form-control" id="modalNama"
                                                        name="" readonly>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="modalKeluhan"
                                                        style="font-weight: bold;">Keluhan</label>
                                                    <div class="complaint-list">
                                                        <div class="list-group" id="modalGejala">
                                                            <!-- Symptoms will be populated here -->
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="form-group mt-3">
                                                    <label for="modalDiagnosisDokter"
                                                        style="font-weight: bold;">Diagnosis
                                                        (Jika tidak verifikasi)</label>
                                                    <div class="mb-3">
                                                        <input type="file" class="form-control" id="bukti"
                                                            name="bukti" accept=".pdf, .jpg, .png"
                                                            aria-describedby="fileHelp">
                                                    </div>
                                                </div> --}}
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="modalIDDiagnosis" style="font-weight: bold;">ID
                                                        Diagnosis</label>
                                                    <input type="text" class="form-control" id="modalIDDiagnosis"
                                                        readonly>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="modalDiagnosisAI" style="font-weight: bold;">Diagnosis
                                                        AI</label>
                                                    <input type="text" class="form-control" id="modalDiagnosisAI"
                                                        readonly>
                                                    <select name="keterangan" id="verificationOption"
                                                        class="form-select">
                                                        <option value="verify">Verify</option>
                                                        <option value="no-verify">No verify</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 text-end mt-3">
                                                <button type="button" class="btn btn-submit"
                                                    id="submitButton">Submit</button>
                                                <!-- Change button color as needed -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="assets/js/sidenav.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var detailModal = document.getElementById('detailModal');
            detailModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var nama = button.getAttribute('data-nama');
                var id = button.getAttribute('data-id');
                var diagnosis = button.getAttribute('data-diagnosis');
                var gejalaString = button.getAttribute('data-gejala');

                // Split gejala string menjadi array
                var gejala = gejalaString ? gejalaString.split(',') : [];

                // Populate the modal fields
                var modalNama = detailModal.querySelector('#modalNama');
                var modalIDDiagnosis = detailModal.querySelector('#modalIDDiagnosis');
                var modalDiagnosisAI = detailModal.querySelector('#modalDiagnosisAI');
                var modalGejala = detailModal.querySelector('#modalGejala');

                modalNama.value = nama;
                modalIDDiagnosis.value = id;
                modalDiagnosisAI.value = diagnosis;

                // Clear previous symptoms
                modalGejala.innerHTML = '';
                if (gejala.length > 0) {
                    for (var i = 0; i < gejala.length; i++) {
                        var symptom = gejala[i].trim().replace(/[,\/"\\\[\]]/g,
                            ''
                        ); // Menghapus koma, garis miring, tanda petik, garis miring terbalik, dan tanda kurung siku
                        if (symptom) { // Jika symptom tidak kosong
                            var symptomElement = document.createElement('a');
                            symptomElement.href = '#';
                            symptomElement.classList.add('list-group-item');
                            symptomElement.textContent = symptom;
                            modalGejala.appendChild(symptomElement);
                        }
                    }
                } else {
                    modalGejala.innerHTML = '<p>No symptoms available.</p>';
                }
            });
            detailModal.addEventListener('hidden.bs.modal', function() {
                detailModal.querySelector('#verificationOption').value = 'verify'; // Reset to default
            });

            var submitButton = document.getElementById('submitButton');
            var verificationOption = document.getElementById('verificationOption');

            submitButton.addEventListener('click', function() {
                var verificationOption = document.getElementById('verificationOption');
                var option = verificationOption.value;
                var idDiagnosis = document.getElementById('modalIDDiagnosis').value;
                var userId = {{ Auth::user()->id }};
                console.log(option);

                if (option == 'verify') {
                    // Send an AJAX request to your server-side controller method
                    sendVerificationRequest(idDiagnosis, userId, "verified");

                    // Update the button color
                    var detailButton = document.getElementById('detailButton-' + idDiagnosis);
                    detailButton.classList.remove('btn-warning');
                    detailButton.classa
                    detailButton.classList.add('btn-success');
                } else {
                    // No action needed for "No verify"
                    console.log('No verification requested.');
                    sendVerificationRequest(idDiagnosis, userId, "not verified");

                    // Update the button color
                    var detailButton = document.getElementById('detailButton-' + idDiagnosis);
                    detailButton.classList.remove('btn-success');
                    detailButton.classList.add('btn-warning');
                }
            });

            function sendVerificationRequest(idDiagnosis, userId, status) {
                fetch('/getIdDokter/' + userId)
                    .then(response => response.json())
                    .then(data => {
                        var idDokter = data;
                        console.log(status);


                        fetch('{{ route('consultations.update') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    id_dokter: idDokter,
                                    id_diagnosis: idDiagnosis,
                                    status: status,
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Close the modal after successful submission
                                    var detailModal = bootstrap.Modal.getInstance(document.getElementById(
                                        'detailModal'));
                                    detailModal.hide();
                                    console.log('Consultation saved successfully!');
                                } else {
                                    console.error('Error saving consultation:', data.error);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    })
                    .catch(error => {
                        console.error('Error fetching idDokter:', error);
                    });
            }


        });
    </script>



</body>

</html>
