<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Opname</title>

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
                    <h2 class="card-title mt-3 ms-2 mb-3 fw-bold">Daftar Menu</h2>
                </div> -->
                <div class="row mt-3">
                    <div class="col-8 ps-2"><div class="ps-2">
                        <h2 class="card-title mt-3 ms-2 mb-3 fw-bold">Master Stock Opname</h2>
                    </div>
                </div>
                        <div class="col-4"><button type="button" class="btn btn-secondary w-75 mt-3">Tambah SO</button>
                    </div>
                </div>
                <div class="row mt-3">
                <div class="col mx-1">
                        <table class="table table-striped table-light">
                            <thead>
                                <tr>
                                    <th>ID Stock Opname</th>
                                    <th>Nama bahan</th>
                                    <th>Jumlah bahan</th>
                                    <th>Jumlah hitung</th>
                                    <th>Selisih stok</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>               
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Daun teh (gr)</td>
                                    <td>3000</td>
                                    <td>3000</td>
                                    <td>0</td>
                                    <td>01-02-2024</td>
                                    <td>
                                        <form action="#" method="POST">
                                            @csrf
                                            <Input type="hidden" name="id_rak" value="">
                                            <button type="submit" style="border: none; background: none;"><i class="bi bi-trash3-fill"></i></button>
                                            <button type="submit" style="border: none; background: none;"><i class="bi bi-pencil-square"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Gulaku (gr)</td>
                                    <td>2000</td>
                                    <td>2000</td>
                                    <td>0</td>
                                    <td>01-02-2024</td>
                                    <td>
                                        <form action="#" method="POST">
                                            @csrf
                                            <Input type="hidden" name="id_rak" value="">
                                            <button type="submit" style="border: none; background: none;"><i class="bi bi-trash3-fill"></i></button>
                                            <button type="submit" style="border: none; background: none;"><i class="bi bi-pencil-square"></i></button>
                                        </form></td>
                                </tr>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>
