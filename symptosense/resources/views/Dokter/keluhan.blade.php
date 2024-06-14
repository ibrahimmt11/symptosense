<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="assets/css/Dokter/keluhan.css">
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
                                        <br>Dokter
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
                    <span class="">Keluhan</span>
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
                                    <th scope="col">Keluhan Baru</th>
                                    <th scope="col">Data Set Terbaru</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataGejala as $num => $dg)
                                    <tr>
                                        <th scope="row">{{ $num + 1 }}</th>
                                        <td>{{ $dg->pasien->nama_lengkap }}</td>
                                        <td>{{ $dg->nama_gejala }}</td>
                                        <td>{{ $dg->dataset }}</td>
                                        <td>
                                            @if ($dg->status == 'menunggu')
                                                <button type="button" class="btn btn-primary btn-menunggu"
                                                    data-bs-toggle="modal" data-bs-target="#detail"
                                                    data-id="{{ $dg->id_gejala }}"
                                                    data-nama="{{ $dg->pasien->nama_lengkap }}"
                                                    data-gejala="{{ $dg->nama_gejala }}"
                                                    data-dataset="{{ $dg->dataset }}">
                                                    Menunggu
                                                </button>
                                            @elseif($dg->status == 'ditolak')
                                                <button type="button" class="btn btn-danger">Ditolak</button>
                                            @else
                                                <button type="button" class="btn btn-succes">Diterima</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--Modal-->
            <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailsModalLabel"
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
                                    <form id="updateForm" action="" method="POST" class="form-valid"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        <!-- Make sure data-id is correctly set -->
                                        <div class="p-3 row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nama" style="font-weight: bold;">Nama
                                                        pasien</label>
                                                    <input type="text" class="form-control" id="nama"
                                                        value="" readonly>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="bukti" style="font-weight: bold;">Data set
                                                        baru</label>
                                                    <div class="mb-3">
                                                        <input type="file" class="form-control" id="bukti"
                                                            name="bukti" accept=".pdf, .jpg, .png"
                                                            aria-describedby="fileHelp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gejala" style="font-weight: bold;">Keluhan
                                                        baru</label>
                                                    <input type="text" class="form-control" id="gejala"
                                                        value="" name="status" readonly>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="" style="font-weight: bold;">Data set
                                                        lama</label>
                                                    <div>
                                                        <i class="lni lni-empty-file" style="font-size: 16px;">
                                                            <span>Data_set_22022023</span></i>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between mt-4">
                                                    <button type="submit" id="status"
                                                        class="btn btn-danger btn-tolak"
                                                        data-status="ditolak">Tolak</button>
                                                    <button type="submit" id="status"
                                                        class="btn btn-success btn-submit"
                                                        data-status="diterima">Terima</button>
                                                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="assets/js/sidenav.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var detailModal = document.getElementById('detail');
            var namaInput = detailModal.querySelector('#nama');
            var gejalaInput = detailModal.querySelector('#gejala');
            var datasetInput = detailModal.querySelector('#bukti');

            // Menambahkan event listener untuk tombol "Menunggu"
            document.querySelectorAll('.btn-menunggu').forEach(function(button) {
                button.addEventListener('click', function() {
                    var id = button.getAttribute('data-id');
                    var nama = button.getAttribute('data-nama');
                    var gejala = button.getAttribute('data-gejala');
                    var dataset = button.getAttribute('data-dataset');

                    namaInput.value = nama;
                    gejalaInput.value = gejala;
                    datasetInput.textContent = dataset;

                    detailModal.querySelector('form').setAttribute('data-id', id);
                });
            });

            // Menambahkan event listener untuk submit form di dalam modal
            var updateForm = document.getElementById('updateForm');
            updateForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                var idGejala = updateForm.getAttribute('data-id');
                var statusButton = event.submitter; // Get the button that was clicked
                var status = statusButton.getAttribute(
                    'data-status'); // Get the status from the data-status attribute

                var formData = new FormData(updateForm);
                formData.append('status', status);

                fetch('/update-status/' + idGejala, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Success:', data);
                        if (data.success) {
                            location.reload();
                        } else {
                            console.error('Update failed:', data);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    </script>
</body>

</html>
