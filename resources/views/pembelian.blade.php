<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian</title>

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
                        <h2 class="card-title mt-3 ms-2 mb-3 fw-bold">Master Data Pembelian</h2>
                    </div>
                </div>
                        <div class="col-4"><button type="button" class="btn btn-secondary w-75 mt-3">Tambah pembelian</button>
                    </div>
                </div>
                <div class="row mt-3">
                <div class="col mx-1">
                        <table class="table table-striped table-light">
                            <thead>
                                <tr>
                                    <th>ID Pembelian</th>
                                    <th>Tanggal pembelian</th>
                                    <th>Produk</th>
                                    <th>Stok</th>
                                    <th>Total harga beli</th>
                                    <th>Aksi</th>               
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @foreach ($value as $pmb)
                                <tr>
                                    <td>{{$pmb->id_pembelian}}</td>
                                    <td>{{$pmb->tanggal_pembelian}}</td>
                                    <td>{{$pmb->nama_bahan}}</td>
                                    <td>{{$pmb->jumlah_barang}}</td>
                                    <td>{{$pmb->total_harga}}</td>
                                    <td>
                                        <form action="#" method="POST">
                                            @csrf
                                            <Input type="hidden" name="id_pembelian" value="{{$pmb->id_pembelian}}">
                                            <button type="submit" style="border: none; background: none;"><i class="bi bi-trash3-fill"></i></button>
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
</body>
</html>
