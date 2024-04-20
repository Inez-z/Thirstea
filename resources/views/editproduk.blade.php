<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit produk</title>

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
                    <h3 class="card-title mt-3 ms-2 mb-3 fw-bold">Tambah produk baru</h3>
                </div>
                <div class="row mt-3">
                    <form action="/action_page.php">
                        <div class="col ps-2">
                            <div class="ps-2">
                                <div class="mb-3 mt-3">
                                    <label for="produk" class="col-8 form-label">Nama produk</label>
                                    <input type="text" class="col-8 form-control" id="produk" placeholder="Masukkan nama produk" name="produk">
                                </div>
                                <div class="row">
                                    <label for="status" class="col-4 form-label">Bahan pembuatan</label>
                                    <a class="col-4 text-end" href=""><i class="bi bi-plus-circle-fill"></i></a>
                                    <label for="status" class="col-4 form-label">Harga Pokok Penjualan</label>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <select id="status" class="form-select" name="status">
                                            <option value="pegawai" selected>Daun teh</option>
                                            <option value=“owner”>Gulaku</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <!-- <label for="email" class="form-label">Nama produk</label> -->
                                        <input type="number" class="form-control" id="email" placeholder="Qty" name="qty">
                                    </div>
                                    <div class="col-4">
                                        <!-- <label for="email" class="form-label">Nama produk</label> -->
                                        <input type="number" class="form-control" id="email" placeholder="Harga Pokok" name="HPP">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-8"></div>
                                        <div class="col-4">
                                            <label for="email" class="form-label">Total HPP/gelas</label>
                                            <input type="number" class="form-control" id="email" placeholder="Harga Pokok" name="HPP">
                                        </div>
                                    <!-- </div> -->
                                </div>
                               
                                <div class="mb-3">
                                    <label for="pwd" class="form-label">Harga jual</label>
                                    <input type="number" class="form-control" id="pwd" placeholder="Masukkan harga jual" name="hargajual">
                                </div>
                                <div class="row">
                                    <div class="col">
                                    </div>
                                    <div class="col text-end">
                                        <button type="submit" class="btn w-50 mt-3 py-3 fw-bold" style="background-color:#535353; color:#FFFFFF;">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>
