<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="assets/css/Pasien/diagnosisP.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Diagnosis</title>
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
                                        @foreach($keluhan as $item)
                                        <option value="{{ $item->nama_keluhan }}">{{ $item->nama_keluhan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Additional dropdown for the second symptom -->
                                <div class="col-6 gejala-dropdown">
                                    <select name="gejala2" id="gejala2" class="form-select">
                                        <option selected disabled value="">Pilih gejala anda</option>
                                        @foreach($keluhan as $item)
                                        <option value="{{ $item->nama_keluhan }}">{{ $item->nama_keluhan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Additional dropdown for the third symptom -->
                                <div class="col-6 gejala-dropdown">
                                    <select name="gejala3" id="gejala3" class="form-select">
                                        <option selected disabled value="">Pilih gejala anda</option>
                                        @foreach($keluhan as $item)
                                        <option value="{{ $item->nama_keluhan }}">{{ $item->nama_keluhan }}</option>
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
                                @forelse($diagnosisHistory as $history)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $history->nama_lengkap }}</td>
                                    <td>{{ $history->id_diagnosis }}</td>
                                    <td>Diagnosis_AI.pdf</td> <!-- Assuming a static file for demonstration -->
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
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultModalLabel">Hasil Diagnosis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content akan diisi oleh JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector('form');
            const tambahGejalaBtn = document.querySelector('.btn-tambah');
            let gejalaCounter = 4; // Start from gejala4 since gejala1, gejala2, and gejala3 are already in HTML

            // Event listener for adding symptoms
            tambahGejalaBtn.addEventListener('click', function() {
                if(gejalaCounter <= 5) { // Limit to a total of 5 symptoms
                    const gejalaContainer = document.getElementById('gejalaContainer');
                    const newDropdown = document.createElement('div');
                    newDropdown.classList.add('col-6', 'gejala-dropdown');
                    newDropdown.innerHTML = `
                        <select name="gejala${gejalaCounter}" id="gejala${gejalaCounter}" class="form-select">
                            <option selected disabled value="">Pilih gejala anda</option>
                            @foreach($keluhan as $item)
                            <option value="{{ $item->nama_keluhan }}">{{ $item->nama_keluhan }}</option>
                            @endforeach
                        </select>`;
                    gejalaContainer.appendChild(newDropdown);
                    gejalaCounter++;
                }
            });
            // Event listener for form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(form);

                // Get selected symptoms
                const selectedSymptoms = [];
                for (let pair of formData.entries()) {
                    if (pair[0].startsWith('gejala') && pair[1] !== '') { // Filter only gejala fields with values
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
                        // Update modal or UI elements with the results
                        const resultText = `Prognosis: ${data.prognosis.join(', ')}\nSelected Symptoms: ${data.selected_symptoms.join(', ')}`;
                        document.querySelector('.modal-body').textContent = resultText;
                        new bootstrap.Modal(document.getElementById('resultModal')).show();

                        // Save the diagnosis to the database
                        fetch('/save-diagnosis', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                prognosis: data.prognosis.join(', '), // Send prognosis as comma-separated string
                                selected_symptoms: selectedSymptoms // Send array of selected symptoms
                            })
                        })
                        .then(response => response.json())
                        .then(saveData => {
                            console.log("Save Diagnosis Response: ", saveData); // Log save response for debugging
                            if (saveData.success) {
                                console.log('Diagnosis saved successfully');
                            } else {
                                console.log('Failed to save diagnosis');
                            }
                        });
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    </script>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/sidenav.js"></script>
</body>

</html>