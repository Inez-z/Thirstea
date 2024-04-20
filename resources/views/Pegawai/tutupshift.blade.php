<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutup Shift</title>

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
                <!-- <div class="row mt-3">
                    <div class="col-md-6">
                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                    </div>
                </div> -->
                <div class="row mt-3">
                    <div class="col">
                    <div class="card mb-3 position-relative start-50 top-50 translate-middle-x" style="width: 30rem; height: 25rem;">
                        <div class="card-body">
                            <h2 class="card-title mt-5 fw-bold">Tutup Shift</h2>
                            <p class="card-text">Rabu, 28 Februari 2024</p>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control py-3 bg-body-secondary" style="" placeholder="Kas akhir" aria-label="Kas akhir" aria-describedby="basic-addon1">
                                </div>
                            <a href="#" class="btn btn-dark text-center mb-2 w-100">Selesai</a>
                            <p class="card-text mt-3 text-center">Tekan “Selesai” untuk mengakhiri transaksi hari ini.</p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>
