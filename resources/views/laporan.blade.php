<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
                @include('sidebar')
            </div>
            <!-- Dropdown Tanggal dan Tabel -->
            <div class="col-md-9 col-xl-10">
                <div class="row mt-3">
                    <h3 class="card-title mt-3 ms-2 mb-3 fw-bold">Laporan</h3>
                </div>
                <div class="row mt-3">
                    <div class="col-8 ps-2"><div class="ps-2">
                    <form action="/action_page.php">
                    <div class="row mt-1">
                        <div class="col-4 d-print-none"><button id="printButton" class="btn btn-secondary w-100 ms-1 fw-bold">Laporan Harian</a></div>
                        <div class="col-4 d-print-none"><button id="printButton" class="btn btn-secondary w-100 ms-1 fw-bold">Laporan Mingguan</button></div>
                        <div class="col-4 d-print-none"><button id="printButton" class="btn btn-secondary w-100 ms-1 fw-bold">Laporan Bulanan</button></div>
                    </div>
                        <div class="mb-3 mt-3">
                            <div class="col">
                                <input type="date" name="tanggal" id="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                        <div class="col mx-1">
                        <table class="table table-striped table-light">
                            <thead>
                                <tr>
                                    <th>ID Produk</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>               
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Es Teh Raksasa</td>
                                    <td>3,000</td>
                                    <td>300,000</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Teh Kampul</td>
                                    <td>4,000</td>
                                    <td>120,000</td>
                                </tr>  
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12">
                            <div class="row">
                                <div class="col fw-bold">Kas Awal</div>
                                <div class="col ms-auto text-end">21,000</div>
                                <div class="col fw-bold">Total Cash</div>
                                <div class="col ms-auto text-end">21,000</div>
                            </div>
                            <div class="row">
                                <!-- bisa cash, tapi kalau pembayaran qris berubah jadi qris -->
                                <div class="col fw-bold">Kas Akhir</div>
                                <div class="col ms-auto text-end">30,000</div>
                                <div class="col fw-bold">Total QRIS</div>
                                <div class="col ms-auto text-end">21,000</div>
                            </div>
                            <div class="row mb-5">
                                <div class="col fw-bold">Total Pemasukan</div>
                                <div class="col ms-auto text-end">9,000</div>
                                <div class="col fw-bold">Total Pengeluaran</div>
                                <div class="col ms-auto text-end">21,000</div>
                            </div>
                </div>
                    </div></div>
                </div>
                <div class="row">
                    <div class="col-8 mt-3 position-relative ">
                        <button type="submit" class="btn w-25 mt-3 ps-1 me-3 py-3 fw-bold end-0 translate-middle-y position-absolute" style="background-color:#535353; color:#FFFFFF;">Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>
