<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stock Opname</title>

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
                    <h3 class="card-title mt-3 ms-2 mb-3 fw-bold">Tambah Stock Opname</h3>
                </div>
                <div class="row mt-3">
                    <div class="col-8 ps-2"><div class="ps-2">
                    <form action="/action_page.php">
                        <div class="mb-3 mt-3">
                            <label for="tanggal" class="form-label">Tanggal stock opname</label>
                            <!-- <input type="text" class="form-control" id="email" placeholder="Masukkan nama akun" name="email"> -->
                            <div class="col">
                                <input type="date" name="tanggal" id="tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="bahan" class="form-label">Nama bahan</label>
                            <select id="bahan" class="form-select" name="bahan">
                                            <option value="pegawai" selected>Daun teh</option>
                                            <option value=“owner”>Gulaku</option>
                             </select>
                        </div>
                        <div class="mb-3">
                            <label for="hargaBeli" class="form-label">Total harga beli</label>
                            <input type="number" class="form-control" id="hargaBeli" placeholder="Masukkan harga beli" name="hargabeli">
                        </div>
                        <div class="mb-3">
                            <label for="jmlHitung" class="form-label">Jumlah hitung</label>
                            <input type="number" class="form-control" id="jmlHitung" placeholder="Masukkan jumlah hitung" name="jumlahhitung">
                        </div>
                        <div class="mb-3">
                            <label for="jmlSistem" class="form-label">Jumlah sistem</label>
                            <input type="number" class="form-control" id="jmlSistem" placeholder="Jumlah stok pada sistem" name="jumlahsistem" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="selisihStok" class="form-label">Selisih stok</label>
                            <input type="number" class="form-control" id="selisihStok" placeholder="Jumlah selisih stok" name="selisihstok" disabled>
                        </div>
                    </div></div>
                </div>
                <div class="row">
                    <div class="col-8 mt-3 position-relative ">
                        <button type="submit" class="btn w-25 mt-3 ps-1 me-3 py-3 fw-bold end-0 translate-middle-y position-absolute" style="background-color:#535353; color:#FFFFFF;">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>
