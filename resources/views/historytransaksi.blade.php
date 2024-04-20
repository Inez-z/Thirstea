<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>

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
                    <div class="col-md-6">
                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <table class="table table-striped table-light">
                            <thead>
                                <tr>
                                    <th>ID Transaksi</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Total</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Kasir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($value as $ht)
                                <tr onclick="submitForm('/detailtransaksi', 'form{{$ht->id_penjualan}}')">
                                    <td>{{$ht->id_penjualan}}</td>
                                    <td>{{$ht->tanggal}}</td>
                                    <td>{{$ht->jam}}</td>
                                    <td>{{$ht->total}}</td>
                                    <td>{{$ht->metode_pembayaran}}</td>
                                    <td>{{$ht->nama_pengguna}}</td>
                                </tr>
                                <form id="form{{$ht->id_penjualan}}" action="/detailtransaksi" method="POST" style="display: none;">
                                @csrf
                                <input type="hidden" value="{{$ht->id_penjualan}}" name="id_penjualan">
                                </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function submitForm(action, formId) {
        document.getElementById(formId).submit();
    }
    </script>
</body>
</html>
