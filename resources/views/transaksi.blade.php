<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
                @csrf
                <div class="row mt-3">
                    <div class="col-8 ps-2">
                        <div class="ps-2">
                            <button type="button" data-bs-toggle="modal", data-bs-target="#modalProduk">Pilih
                                Produk</button>
                        </div>
                    </div>
                    <div class="col-4">


                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col mx-1">
                        <form action="/transaksipembayaran" method="post">
                            @csrf
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
                                <tbody id="item-body">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2" class="fw-bold">Total</td>
                                        <input type="hidden" id="hidden-sum-jumlah" name="sumJumlah" value="0">
                                        <td id="sum-jumlah">0</td>
                                        <input type="hidden" id="hidden-sum-harga" name="sumHarga" value="0">
                                        <td id="sum-harga">0</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4"><button type="submit" class="btn btn-secondary w-100 ms-1" name="bayar"
                            value="bayar">Bayar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="modalProduk" tabindex="-1" aria-labelledby="modalProdukTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header row">
                    {{-- <h5 class="modal-title" id="modalProdukTitle">Modal title</h5> --}}
                    <div class="col-6">
                        {{-- <form id="searchForm" role="search">
                            <input type="search" class="form-control" name="search" id="searchInput"
                                placeholder="Cari ID/Nama produk">
                        </form> --}}
                    </div>
                    <div class="col-6 text-end pe-4">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            @foreach ($value as $produk)
                                <tr>
                                    <th scope="row">{{ $produk->id_produk }}</th>
                                    <td>{{ $produk->nama_produk }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchResults').on('click', 'tr', function() {
                let id_produk = $(this).find('th').text(); // Ambil id_produk dari baris yang diklik
                console.log(id_produk);
                // Kirim permintaan AJAX untuk mendapatkan data produk berdasarkan id_produk

                $.ajax({
                    type: 'GET',
                    url: '/selectProdukTransaksi', // Ganti URL dengan URL yang sesuai di aplikasi Anda
                    data: {
                        id_produk: id_produk
                    },
                    success: function(response) {
                        // Tambahkan baris baru ke dalam tabel
                        $('#item-body').append(
                            '<tr>' +
                            '<td><input type="hidden" id="id_produk" name="id_produk[]" value="' +
                            response.id_produk + '">' + response.id_produk + '</td>' +
                            '<td>' + response.nama_produk + '</td>' +
                            '<td><input type="number" class="jumlah form-control border border-0 bg-opacity-10" id="jumlah" name="jumlah[]" value="1" min="0"></td>' +
                            '<td><input type="hidden" class="harga" id="harga" name="harga[]" value="' +
                            response.harga_jual + '" min="0">' + response.harga_jual +
                            '</td>' +
                            '<td>' +
                            '<button type="button" style="border: none; background: none;" class="btn-delete"><i class="bi bi-trash3-fill"></i></button>' +
                            '</td>' +
                            '</tr>'
                        );
                        $('#modalProduk').modal('hide');
                        calculateTotal();
                    },

                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', error);
                        console.log('XHR status:', xhr.status);
                        console.log('XHR statusText:', xhr.statusText);
                        console.log('Server response:', xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk menghitung jumlah total dan harga total
            function calculateTotal() {
                var totalJumlah = 0;
                var totalHarga = 0;

                $('#item-body tr').each(function() {
                    var jumlah = parseInt($(this).find('.jumlah').val());
                    var harga = parseInt($(this).find('.harga').val());
                    var subtotal = jumlah * harga;
                    $(this).find('.subtotal').text(subtotal.toLocaleString()); // Update subtotal
                    totalJumlah += jumlah;
                    totalHarga += subtotal;
                });

                $('#hidden-sum-jumlah').val(totalJumlah);
                $('#sum-jumlah').text(totalJumlah.toLocaleString()); // Update total jumlah
                $('#hidden-sum-harga').val(totalHarga);
                $('#sum-harga').text(totalHarga.toLocaleString()); // Update total harga
            }

            // Event listener untuk perubahan jumlah
            $('#item-body').on('change', '.jumlah', function() {
                calculateTotal();
            });

            // Event listener untuk tombol hapus baris
            $('#item-body').on('click', '.btn-delete', function() {
                $(this).closest('tr').remove();
                calculateTotal(); // Hitung kembali total setelah menghapus item
            });

            // Event listener saat dokumen selesai dimuat
            $(document).ready(function() {
                calculateTotal(); // Hitung total saat dokumen selesai dimuat
            });

            $('#modalProduk').on('hidden.bs.modal', function() {
                calculateTotal(); // Hitung kembali total setelah modal ditutup
            });

            $('#item-body').on('click', '.btn-plus', function() {
                var jumlahElement = $(this).closest('tr').find('.jumlah');
                var jumlah = parseInt(jumlahElement.val());
                jumlahElement.val(jumlah + 1);
                calculateTotal(); // Hitung kembali total setelah menambah jumlah
            });

            $('#item-body').on('click', '.btn-minus', function() {
                var jumlahElement = $(this).closest('tr').find('.jumlah');
                var jumlah = parseInt(jumlahElement.val());
                if (jumlah > 1) {
                    jumlahElement.val(jumlah - 1);
                    calculateTotal(); // Hitung kembali total setelah mengurangi jumlah
                }
            });
        });
    </script>


</body>

</html>
