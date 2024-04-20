<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>

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
                    <h3 class="card-title mt-3 ms-2 mb-3 fw-bold">Uang diterima</h3>
                </div>
                <div class="row mt-3">
                    <div class="col-8 ps-2"><div class="ps-2">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control py-3 bg-body-secondary" style="" placeholder="Masukkan nominal pembayaran" aria-label="uangditerima" aria-describedby="basic-addon1">
                    </div>
                    </div></div>
                </div>
                <div class="row mt-3">
                    <h3 class="card-title mt-3 ms-2 mb-3 fw-bold">Metode Pembayaran</h3>
                </div>
                <!-- <div class=" mt-3">
                    <div class="col"><button type="button" class="btn btn-outline-secondary w-25 ps-1 me-3 py-3">Cash</button>
                    <button type="button" class="btn btn-outline-secondary w-25 ps-1 py-3">QRIS</button></div>
                </div> -->
                <div class=" mt-3">
                    <div class="col">
                        <input type="radio" class="btn-check" name="metode" value="Cash" id="Cash">
                        <label class="btn btn-outline-secondary w-25 ps-1 me-3 py-3" for="Cash">Cash</label>
                        <input type="radio" class="btn-check" name="metode" value="QRIS" id="Qris">
                        <label class="btn btn-outline-secondary w-25 ps-1 py-3" for="Qris">QRIS</label>
                    </div>
                </div>
                <div class="row mt-3">
                    <h3 class="card-title mt-3 ms-2 mb-3 fw-bold">Ringkasan Order</h3>
                </div>
                <div class="row">
                    <div class="col-4 fw-bold"><div class="ms-2">Total</div></div>
                    <div class="col-8"><div class="ms-1">Rp. 70.000</div></div>
                </div>
                <div class="row">
                    <div class="col-4 fw-bold"><div class="ms-2">Pembayaran</div></div>
                    <div class="col-8"><div class="ms-1">Rp. 70.000</div></div>
                </div>
                 <div class="row">
                    <div class="col-4 fw-bold"><div class="ms-2">Kembalian</div></div>
                    <div class="col-8"><div class="ms-1">Rp. 0</div></div>
                </div>
               <div class=" mt-3">
                   <a href="/detailtransaksi" type="button" class="btn w-25 mt-3 ps-1 me-3 py-3 fw-bold" style="background-color:#535353; color:#FFFFFF;">Konfirmasi</a>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>
