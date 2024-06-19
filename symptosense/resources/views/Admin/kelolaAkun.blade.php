<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="assets/css/Admin/kelolaAkun.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Konsultasi</title>
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
                    <a href="/dashboardA" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-grid-alt"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="/kelolaAkun" class="d-flex align-items-center sidebar-link py-3">
                        <i class="fs-2 lni lni-users"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Kelola Akun</span>
                    </a>
                </li>
            </ul>

            <ul class="list-unstyled px-2 bottom-nav">
                <li class=""><a href="/pengaturanA" class="d-flex align-items-center sidebar-link py-3"><i
                            class="fs-2 lni lni-cog"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Pengaturan</span></a></li>
                <li class=""><a href="/login" class="d-flex align-items-center sidebar-link py-3"><i
                            class="fs-2 lni lni-exit"></i>
                        <span class="fs-6 ms-2 d-none d-sm-inline">Logout</span></a></li>
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
                                    <img src="assets/images/profile.png" alt="Profile Picture"
                                        class="rounded-circle me-2 profile-pic">
                                    <div>
                                        {{ Auth::user()->name }}
                                        <br>Admin
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container mt-5 mb-4">
                <div class="p-4 table-box d-flex align-item-center judul">
                    <i class="fs-2 lni lni-users"></i>
                    <span class="">Kelola Akun</span>
                </div>
            </div>

            <div class="container mt-5 mb-5">
                <div class="p-3 table-box">
                    <form class="d-flex" role="search" id="search">
                        <input class="form-control me-2" type="search" placeholder="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <div class="container mt-3">
                        <div class="p-3 judul-content-table">
                            <h5 class="mt-2 mb-2">Daftar Akun</h5>
                        </div>
                    </div>
                    <div class="container">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">ID Akun</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tanggal bergabung</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('d.m.Y') }}</td>
                                        <td>
                                            <form id="statusForm{{ $user->id }}"
                                                action="{{ $user->status == 'Aktif' ? route('deactivate', ['id' => $user->id]) : route('activate', ['id' => $user->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('GET')
                                                <button type="submit"
                                                    class="btn {{ $user->status == 'Aktif' ? 'btn-done' : 'btn-meet' }}">
                                                    {{ $user->status }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="assets/js/sidenav.js"></script>
</body>

</html>
