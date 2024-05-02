<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="assets/css/Admin/dashboardA.css">
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
                    <a href="/dashboardA" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-grid-alt"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="/kelolaAkun" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-users"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline"> Kelola Akun</span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled px-2 bottom-nav">
                <li class=""><a href="/pengaturanA" class="d-flex align-items-center sidebar-link py-3"><i class="fs-2 lni lni-cog"></i>
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
                                    <div>
                                        Epul
                                        <br>Admin
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="row gl-2">
                <div class="dashboard-content px-3 pt-4 w-100 d-flex">
                    <div class="col-md-8">
                        <div class="content-box d-flex align-items-center col-md-6">
                            <img src="assets/images/pasien.png" alt="Gambar" class="img-fluid me-3">
                            <div class="text-content">
                                <h2 class="title">Pasien</h2>
                                <h2>500</h2>
                                <p class="description">10 Pasien bergabung minggu ini</p>
                            </div>
                        </div>
                        <div class="content-box d-flex align-items-center col-md-6">
                            <img src="assets/images/diagnosis.png" alt="Gambar" class="img-fluid me-3">
                            <div class="text-content">
                                <h2 class="title">Dokter</h2>
                                <h2 class="fs-5s">20</h2>
                                <p class="description">1 Dokter bergabung minggu ini</p>
                            </div>
                        </div>
                        <div class="container mt-4 mb-5 col-md-8">
                            <div class="p-3 table-box">
                                <h2 class="title">Overview Pasien</h2>
                                <canvas id="myPieChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center antrian">
                            <div class="text-content">
                                <h2 class="p-3 title">Dokter Aktif</h2>
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <img src="assets/images/pasien.png" class="rounded-circle me-2 profile-pic" alt="Profile Picture">
                                        <div>
                                            <span class="fw-bold">Dr. Adbi Kusuma</span><br>
                                            <span>Spesialis Anak</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <img src="assets/images/diagnosis.png" class="rounded-circle me-2 profile-pic" alt="Profile Picture">
                                        <div>
                                            <span class="fw-bold">Dr. Jason</span><br>
                                            <span>Spesialis Mata</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <img src="assets/images/profile.png" class="rounded-circle me-2 profile-pic" alt="Profile Picture">
                                        <div>
                                            <span class="fw-bold">Dr. Ronald</span><br>
                                            <span>Spesialis Kulit</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <img src="assets/images/profile.png" class="rounded-circle me-2 profile-pic" alt="Profile Picture">
                                        <div>
                                            <span class="fw-bold">Dr. Tirta</span><br>
                                            <span>Spesialis Anak</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <img src="assets/images/diagnosis.png" class="rounded-circle me-2 profile-pic" alt="Profile Picture">
                                        <div>
                                            <span class="fw-bold">Dr. Cahya</span><br>
                                            <span>Spesialis Mata</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>





    </div>
    </div>


    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Child', 'Teen', 'Adult', 'Older'],
                datasets: [{
                    data: [160, 100, 40, 200],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)', // Child
                        'rgba(54, 162, 235, 0.7)', // Teen
                        'rgba(255, 206, 86, 0.7)', // Adult
                        'rgba(75, 192, 192, 0.7)' // Older
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                legend: {
                    position: 'left',
                },
                tooltips: {
                    position: 'nearest',
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var currentValue = dataset.data[tooltipItem.index];
                            return currentValue;
                        }
                    }
                },
                plugins: {
                    datalabels: {
                        anchor: 'end', // This positions labels at the end of slices
                        align: 'right' // This aligns the labels to the right
                    }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/sidenav.js"></script>
</body>

</html>