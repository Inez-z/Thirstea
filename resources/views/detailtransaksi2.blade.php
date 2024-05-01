<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @media print {
            @page {
                size: auto;
                margin: 1cm;
            }
        }
    </style>
</head>

<body>
    {{-- untuk input --}}
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-xl-2 px-sm-2 px-0 bg-light d-print-none">
                @include('sidebar')
            </div>
            <!-- Dropdown Tanggal dan Tabel -->
            <div class="col-md-9 col-xl-10">
                <div class="row">
                    <div class="col">
                        <div class="row mt-3 d-print-none">
                            <h2 class="card-title mt-3 ms-2 mb-3 fw-bold d-print-none">Detail Transaksi</h2>
                        </div>
                        <form action="/inputPenjualan" method="post">
                            @csrf
                            <div class="card mx-2 w-100">
                                <div class="card-body">
                                    <h5 class="text-center mt-4 mb-4 fw-bold">Thirstea Tea and Chocolate</h5>
                                    <div class="row">
                                        <div class="col-4 fw-bold">Tanggal </div>
                                        <div class="col-8 ">{{ now() }}</div>
                                        <input type="hidden" name="tanggal" value="{{ now() }}">
                                    </div>
                                    {{-- <div class="row">
                                <div class="col-4 fw-bold">ID Transaksi </div>
                                <div class="col-8 ">{{$value[0]->id_penjualan}}</div>
                            </div> --}}
                                    <hr>
                                    @foreach ($data as $nota)
                                        <div class="row">
                                            <div class="col-5">{{ $nota['nama_produk'] }}</div>
                                            <input type="hidden" name="id_produk[]" value="{{ $nota['id_produk'] }}">
                                            <div class="col-2">{{ $nota['jumlah'] }}</div>
                                            <input type="hidden" name="jumlah[]" value="{{ $nota['jumlah'] }}">
                                            <div class="col-5 ms-auto text-end">{{ $nota['harga'] * $nota['jumlah'] }}
                                            </div>
                                            <input type="hidden" name="subtotal[]" value="{{ $nota['harga'] * $nota['jumlah'] }}">
                                        </div>
                                        @endforeach
                                        <hr>
                                        <div class="row">
                                            <div class="col fw-bold">Total</div>
                                            <div class="col ms-auto text-end">{{ $inputs['totalHarga'] }}</div>
                                            <input type="hidden" name="totalHarga" value="{{ $inputs['totalHarga'] }}">
                                        </div>
                                        <div class="row">
                                            <!-- bisa cash, tapi kalau pembayaran qris berubah jadi qris -->
                                            <div class="col fw-bold">{{ $inputs['metode'] }}</div>
                                            <input type="hidden" name="metode" value="{{ $inputs['metode'] }}">
                                            <div class="col ms-auto text-end">{{ $inputs['uangTerima'] }}</div>
                                            <input type="hidden" name="uangTerima" value="{{ $inputs['uangTerima'] }}">
                                        </div>
                                        <hr>
                                        <div class="row mb-5">
                                            <div class="col fw-bold">Kembalian</div>
                                            <div class="col ms-auto text-end">{{ $inputs['kembalian'] }}</div>
                                            <input type="hidden" name="kembalian" value="{{ $inputs['kembalian'] }}">
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col text-center">Terima Kasih</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 d-print-none">
                                <div class="col-6 d-print-none"><button type="submit"
                                        class="btn btn-secondary w-100 ms-1">Tutup</a></div>
                                <div class="col-6 d-print-none"><button type="submit" id="printButton"
                                        class="btn btn-secondary w-100 ms-1">Cetak</button></div>
                            </div>
                        </form>
                    </div>
                    <div class="col-6 d-print-none"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="d-print-none">
        <button id="printButton" class="btn btn-primary rounded-pill position-absolute bottom-0 end-0 mb-4 me-4 py-3 px-3 opacity-75 "><i class="bi bi-printer-fill"></i></button>
    </div> -->
    <script>
        // function ke print page
        function handlePrint() {
            window.print(); // Trigger browser's print
        }

        // Add click event listener to the print button
        document.getElementById('printButton').addEventListener('click', handlePrint);
    </script>
</body>

</html>
