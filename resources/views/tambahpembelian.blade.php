<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembelian</title>

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
                    <h3 class="card-title mt-3 ms-2 mb-3 fw-bold">Tambah pembelian</h3>
                </div>
                <div class="row mt-3">
                    <div class="col-8 ps-2"><div class="ps-2">
                    <form action="/insertpembelian" method="POST" id="myForm">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="tanggal" class="form-label">Tanggal pembelian</label>
                            <!-- <input type="text" class="form-control" id="email" placeholder="Masukkan nama akun" name="email"> -->
                            <div class="col">
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{now()}}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="bahan" class="form-label">Nama bahan</label>
                            <select id="bahan" class="form-select" name="bahan">
                                <option value=""></option>
                                @foreach($value as $bahan)
                                <option value="{{$bahan->id_bahan}}">{{$bahan->nama_bahan}}</option>
                                @endforeach
                             </select>
                            <!-- <input type="email" class="form-control" id="pwd" placeholder="Masukkan email akun" name="pswd"> -->
                        </div>
                        <div class="mb-3">
                            <label for="hargaBeli" class="form-label">Total harga beli</label>
                            <input type="number" class="form-control" id="hargaBeli" placeholder="Masukkan harga beli" name="hargabeli">
                        </div>
                        <div class="mb-3">
                            <label for="stokBahan" class="form-label">Stok bahan</label>
                            <input type="number" class="form-control" id="stokBahan" placeholder="Masukkan stok bahan" name="stokbahan">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let today = new Date();
            let formattedDate = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
            document.querySelector("#tanggal").value = formattedDate;
        });
    </script>

</body>
</html>


