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
                    <h2 class="card-title mt-3 ms-2 mb-3 fw-bold">Daftar Menu</h2>
                </div>
                <form action="/insertproduk" method="post">
                    @csrf
                <div class="row mt-3">
                    <div class="col-8 ps-2"><div class="ps-2">
                    <select class="form-control choices-single" name="id_produk">
                    <option></option>
                    <!-- value isi id produk, text nya untuk tampilan -->
                    @foreach($value as $value)
                    <option value="{{$value->id_produk}}">{{$value->nama_produk}}</option>
                    @endforeach
                    </select>
                    </div>
                </div>
                        <div class="col-4"><button type="submit" class="btn btn-secondary w-75">Tambah item</button>
                        
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                <div class="col mx-1">
                        <table class="table table-striped table-light">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>               
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- foreach($viewdetail as $vd) -->
                                    <td>1</td>
                                    <td>Es Teh Raksasa</td>
                                    <td>2</td>
                                    <td>3000</td>
                                    <td>
                                        <form action="#" method="POST">
                                            @csrf
                                            <Input type="hidden" name="id_rak" value="">
                                            <button type="submit" style="border: none; background: none;"><i class="bi bi-trash3-fill"></i></button>
                                            <button type="submit" style="border: none; background: none;"><i class="bi bi-plus-circle-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- endforeach -->
                                <tr>
                                    <td colspan="2" class="fw-bold">Total</td>
                                    <td>5</td>
                                    <td>6000</td>
                                    <td></td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4"><a href="/transaksipembayaran" class="btn btn-secondary w-100 ms-1">Bayar</a>
            </div>
        </div>
    </div>   
</body>
</html>
