<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="assets/css/Pasien/diagnosisP.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Diagnosis</title>
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
                <li class=""><a href="/pengaturanP" class="d-flex align-items-center sidebar-link py-3"><i
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
                                    <img src="{{ asset($pasien->profile_picture) }}" alt="Profile Picture" class="rounded-circle me-2 profile-pic">
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

            <div class="container mt-5 mb-4">
                <div class="p-4 table-box d-flex align-item-center judul">
                    <i class="fs-2 lni lni-clipboard"></i>
                    <span class="">Diagnosis</span>
                </div>
            </div>

            <div class="container">
                <div class="p-3 judul-content-diagnosis">
                    <h5 class="mt-2 mb-2">Check Diagnosis</h5>
                </div>
                <div class="p-3 content-diagnosis">
                    <div class="info">
                        <p class="info-text">Isi gejala yang anda alami!!</p>
                    </div>
                    <div class="container text-center">
                        <form action="http://localhost:5000/submit" method="post">
                            <div class="row g-2" id="gejalaContainer">
                                <!-- Existing dropdown for the first symptom -->
                                <div class="col-6 gejala-dropdown">
                                    <select name="gejala1" id="gejala1" class="form-select">
                                        <option selected disabled value="">Pilih gejala anda</option>
                                        @foreach ($keluhan as $item)
                                            <option value="{{ $item->nama_keluhan }}">{{ $item->nama_keluhan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Additional dropdown for the second symptom -->
                                <div class="col-6 gejala-dropdown">
                                    <select name="gejala2" id="gejala2" class="form-select">
                                        <option selected disabled value="">Pilih gejala anda</option>
                                        @foreach ($keluhan as $item)
                                            <option value="{{ $item->nama_keluhan }}">{{ $item->nama_keluhan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Additional dropdown for the third symptom -->
                                <div class="col-6 gejala-dropdown">
                                    <select name="gejala3" id="gejala3" class="form-select">
                                        <option selected disabled value="">Pilih gejala anda</option>
                                        @foreach ($keluhan as $item)
                                            <option value="{{ $item->nama_keluhan }}">{{ $item->nama_keluhan }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row g-2 sec-btn">
                                <div class="col-6">
                                    <button type="button" class="btn btn-tambah">
                                        <i class="fas fa-plus"></i> Tambah Gejala
                                    </button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-hasil">
                                        <i class="fas fa-eye"></i> Lihat Hasil Gejala
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                            <h5 class="mt-2 mb-2">History Diagnosis</h5>
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
                                @forelse($diagnosisHistory->slice($startIndex, 5) as $history)
                                <tr>
                                    <th scope="row">{{ $loop->index + $startIndex + 1  }}</th>
                                    <td>{{ $history->nama_lengkap }}</td>
                                    <td>{{ $history->id_diagnosis }}</td>
                                    <td>{{ $history->hasil_diagnosis }}</td>
                                    <!-- Assuming a static file for demonstration -->
                                    <td>{{ $history->diagnosis_dokter }}</td>
                                    <td>
                                        <button type="button" class="btn {{ $history->status == 'Done' ? 'btn-done' : 'btn-meet' }}">
                                            {{ $history->status }}
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada history diagnosis.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <nav aria-label="Pagination">
                                <ul class="pagination">
                                    <!-- Previous Button -->
                                    <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $currentPage == 1 ? '#' : '?page=' . ($currentPage - 1) }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>

                                    <!-- Page Numbers -->
                                    @php
                                    $totalPages = ceil($diagnosisHistory->count() / 5);
                                    $startPage = max(1, $currentPage - 2);
                                    $endPage = min($totalPages, $startPage + 4);
                                    $startPage = max(1, $endPage - 4);
                                    @endphp

                                    @for ($page = $startPage; $page <= $endPage; $page++) <li class="page-item {{ $currentPage == $page ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $page == 1 ? '?' : '?page=' . $page }}">{{ $page }}</a>
                                        </li>
                                        @endfor

                                        <!-- Next Button -->
                                        <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $currentPage == $totalPages ? '#' : '?page=' . ($currentPage + 1) }}" aria-label="Next">
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

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultModalLabel">Diagnosis Details</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="p-3 title">Active Doctors</h2>
                            <div class="list-group">
                                <!-- Doctor items will be appended here by JavaScript -->
                            </div>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="container ct">
                                <h3 class="fw-bold" id="namaPenyakit"></h3>
                                <!-- Content will be populated here -->
                            </div>
                            <div class="container ct">
                                <h6 class="fw-bold disease">Gejala</h6>
                                <p id="gejala" style="padding-left: 10px;  padding-bottom: 10px;">Dynamic content
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector('form');
            const tambahGejalaBtn = document.querySelector('.btn-tambah');
            let gejalaCounter = 4;

            tambahGejalaBtn.addEventListener('click', function() {
                if (gejalaCounter <= 5) {
                    const gejalaContainer = document.getElementById('gejalaContainer');
                    const newDropdown = document.createElement('div');
                    newDropdown.classList.add('col-6', 'gejala-dropdown');
                    newDropdown.innerHTML = `
                    <select name="gejala${gejalaCounter}" id="gejala${gejalaCounter}" class="form-select">
                        <option selected disabled value="">Pilih gejala anda</option>
                        @foreach ($keluhan as $item)
                        <option value="{{ $item->nama_keluhan }}">{{ $item->nama_keluhan }}</option>
                        @endforeach
                    </select>`;
                    gejalaContainer.appendChild(newDropdown);
                    gejalaCounter++;
                }
            });

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(form);
                const selectedSymptoms = [];
                for (let pair of formData.entries()) {
                    if (pair[0].startsWith('gejala') && pair[1] !== '') {
                        selectedSymptoms.push(pair[1]);
                    }
                }

                fetch('http://localhost:5000/submit', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.error) {
                            alert(data.error);
                        } else {
                            new bootstrap.Modal(document.getElementById('resultModal')).show();

                            document.getElementById('namaPenyakit').textContent = data.prognosis.join(
                                ', ');

                            const gejalaDenganNomor = selectedSymptoms.map((gejala, index) => {
                                return `${index + 1}. ${gejala}<br>`;
                            });
                            document.getElementById('gejala').innerHTML = gejalaDenganNomor.join('');

                            fetch('/save-diagnosis', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector(
                                            'meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify({
                                        prognosis: data.prognosis.join(', '),
                                        selected_symptoms: selectedSymptoms,
                                        
                                    })
                                })
                                .then(response => response.json())
                                .then(saveData => {
                                    if (saveData.success) {
                                        console.log('Diagnosis saved successfully');
                                        fetchDoctors(data.prognosis.join(', '), selectedSymptoms);
                                    } else {
                                        console.log('Failed to save diagnosis');
                                    }
                                });
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });

            function fetchDoctors(prognosis, selectedSymptoms) {
                fetch('/doctors')
                    .then(response => response.json())
                    .then(doctors => {
                        const doctorList = document.querySelector('.list-group');
                        doctorList.innerHTML = '';
                        doctors.forEach(doctor => {
                            const doctorItem = document.createElement('a');
                            doctorItem.href = '#';
                            doctorItem.classList.add('list-group-item', 'list-group-item-action',
                                'd-flex', 'align-items-center');
                            doctorItem.innerHTML =
                                `
                            <img src="assets/images/profile.png" class="rounded-circle me-2 profile-pic" alt="Profile Picture">
                            <div class="flex-grow-1">
                                <span class="fw-bold">${doctor.nama_lengkap}</span><br>
                                <span>${doctor.id_dokter}</span>
                            </div>
                            <button type="button" class="btn btn-primary pilih-btn ms-auto" data-id="${doctor.id_dokter}" data-prognosis="${prognosis}" data-symptoms='${JSON.stringify(selectedSymptoms)}'>Pilih</button>`;
                            doctorList.appendChild(doctorItem);
                        });

                        document.querySelectorAll('.pilih-btn').forEach(button => {
                            button.addEventListener('click', function() {
                                const doctorId = this.getAttribute('data-id');
                                const prognosis = this.getAttribute('data-prognosis');
                                const symptoms = JSON.parse(this.getAttribute('data-symptoms'));

                                // Fetch id_pasien and id_diagnosis from somewhere in your page
                                const idPasien =
                            getLoggedInUserId(); // Example function to get id_pasien

                                // Example function to get id_diagnosis
                                fetch(`/get-newly-created-diagnosis-id/${idPasien}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.id) {
                                            const idDiagnosis = data
                                            .id; // Assuming the diagnosis ID is returned in the response
                                            const hasilKonsul = 'Some hardcoded result';
                                            const status = 'Some hardcoded status';

                                            saveConsultation(doctorId, idPasien,
                                                idDiagnosis, hasilKonsul, status,
                                                'Menunggu');
                                        } else {
                                            console.error(
                                                'Failed to get newly created diagnosis ID'
                                                );
                                        }
                                    })
                                    .catch(error => console.error('Error:', error));
                            });

                        });
                    })
                    .catch(error => console.error('Error fetching doctors:', error));
            }

            // Define the function to retrieve the logged-in user's ID
            function getLoggedInUserId() {
                // Implement logic to retrieve the logged-in user's ID here
                // For example, if the user's ID is stored in a global variable or in the DOM:
                return {{ Auth::id() }}; // Replace this with the actual method to fetch the user's ID in your application
            }

            function getNewlyCreatedDiagnosisId(pasienId) {
                return fetch(`/get-newly-created-diagnosis-id/${pasienId}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Failed to retrieve newly created diagnosis ID');
                        }
                        return response.json();
                    })
                    .then(data => {
                        return data.id;
                    })
                    .catch(error => {
                        console.error('Error fetching newly created diagnosis ID:', error);
                        return null;
                    });
            }


            function saveConsultation(doctorId, idPasien, idDiagnosis, hasilKonsul, status, keterangan) {
                fetch('/save-consultation', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify({
                            id_dokter: doctorId,
                            id_pasien: idPasien,
                            id_diagnosis: idDiagnosis,
                            hasil_konsul: hasilKonsul,
                            status: status,
                            keterangan: keterangan
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Consultation saved successfully');
                            // Handle success actions here
                        } else {
                            console.log('Failed to save consultation');
                        }
                    });
            }

            // Attach event listener to each row in the diagnosis history table
            document.querySelectorAll('.diagnosis-row').forEach(row => {
                row.addEventListener('click', function() {
                    console.log('Row clicked:', this.dataset.id);
                    const id_diagnosis = this.dataset.id;
                    fetchDiagnosisDetails(id_diagnosis);
                });
            });

            // Function to fetch diagnosis details and populate modal
            function fetchDiagnosisDetails(id_diagnosis) {
                console.log('Fetching details for ID:', id_diagnosis);
                fetch(`/get-diagnosis-details/${id_diagnosis}`)
                    .then(response => {
                        console.log('Response:', response);
                        return response.json();
                    })
                    .then(data => {
                        console.log('Data received:', data);
                        if (data.error) {
                            alert(data.error);
                        } else {
                            // Populate modal with fetched data
                            document.getElementById('diseaseName').textContent = data.hasil_diagnosis;
                            document.getElementById('complaints').textContent = data.gejala_terpilih;
                            // Show the modal
                            new bootstrap.Modal(document.getElementById('resultModal')).show();
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }




        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="assets/js/sidenav.js"></script>
</body>

</html>
