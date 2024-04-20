<!DOCTYPE HTML>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	<!-- <title>Login & Logout PHP</title> -->
</head>
<body>
    <!-- <div class="container-fluid"> -->
        <div class="row flex-nowrap">
            <div class="bg-light">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <!-- <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a> -->
                    <img src="img/black_thirstea.png" class="img-fluid mx-auto mt-3" style="max-height: 90px;"alt="">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        @if(Session::get('status') == 'Pegawai')
                        <li class="nav-item ">
                            <a href="/buka-shift" class="nav-link align-middle px-0 text-black">
                            <i class="bi bi-calendar-check"></i> <span class="ms-1 d-none d-sm-inline ">Buka Shift</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/transaksi" class="nav-link align-middle px-0 text-black">
                            <i class="bi bi-arrow-left-right"></i> <span class="ms-1 d-none d-sm-inline ">Transaksi</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/history-transaksi" class="nav-link align-middle px-0 text-black">
                            <i class="bi bi-clock-history"></i> <span class="ms-1 d-none d-sm-inline ">Histori Transaksi</span>
                            </a>
                        </li>
                        @elseif(Session::get('status') == 'Owner')
                        <li class="nav-item ">
                            <a href="/history-transaksi" class="nav-link align-middle px-0 text-black">
                                <i class="bi bi-clock-history"></i> <span class="ms-1 d-none d-sm-inline ">Histori Transaksi</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/transaksi" class="nav-link align-middle px-0 text-black">
                            <i class="bi bi-arrow-left-right"></i> <span class="ms-1 d-none d-sm-inline ">Transaksi</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/produk" class="nav-link align-middle px-0 text-black">
                            <i class="bi bi-journal-text"></i></i> <span class="ms-1 d-none d-sm-inline ">Produk</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/bahan" class="nav-link align-middle px-0 text-black">
                            <i class="bi bi-bag-fill"></i></i> <span class="ms-1 d-none d-sm-inline ">Bahan</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/pembelian" class="nav-link align-middle px-0 text-black">
                            <i class="bi bi-clipboard2-data"></i> <span class="ms-1 d-none d-sm-inline ">Pembelian</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/stockopname" class="nav-link align-middle px-0 text-black">
                            <i class="bi bi-cart-fill"></i> <span class="ms-1 d-none d-sm-inline ">Stock Opname</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/laporan" class="nav-link align-middle px-0 text-black">
                            <i class="bi bi-file-earmark-bar-graph"></i> <span class="ms-1 d-none d-sm-inline ">Laporan</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/buatakun" class="nav-link align-middle px-0 text-black">
                            <i class="bi bi-people-fill"></i> <span class="ms-1 d-none d-sm-inline ">Buat Akun</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-black text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                            <!-- <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle"> -->
                            <i class="bi bi-person-circle text-black"></i>
                            <span class="d-none d-sm-inline mx-1 text-black">{{Session::get('status')}}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li> -->
                            <li><a class="dropdown-item" href="#">{{Session::get('nama')}}</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/login/clear">Sign out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col py-3">
                
            </div>
        </div>
    <!-- </div> -->
</body>