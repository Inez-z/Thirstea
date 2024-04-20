<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Akun</title>

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
                    <h3 class="card-title mt-3 ms-2 mb-3 fw-bold">Buat akun baru</h3>
                </div>
                <div class="row mt-3">
                    <div class="col-8 ps-2"><div class="ps-2">
                    <form action="/action_page.php">
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="email" placeholder="Masukkan nama akun" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Email</label>
                            <input type="email" class="form-control" id="pwd" placeholder="Masukkan email akun" name="pswd">
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Masukkan password akun" name="pswd">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select id="status" class="form-select" name="status">
                                <option value="pegawai" selected>Pegawai</option>
                                <option value=“owner”>Owner</option>
                            </select>
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
