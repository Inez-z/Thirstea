<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>

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
                <!-- <div class="row mt-3">
                    <h2 class="card-title mt-3 ms-2 mb-3 fw-bold">Daftar Menu</h2>
                </div> -->
                <div class="row mt-3">
                    <div class="col-8 ps-2">
                        <div class="ps-2">
                            <h2 class="card-title mt-3 ms-2 mb-3 fw-bold">Master Data Bahan</h2>
                        </div>
                    </div>
                    {{-- <button type="button" class="btn btn-dark bg-gradient" data-bs-toggle="modal" data-bs-target="#modalTambahBahan">
Tambah
</button> --}}
                    <div class="col-4"><button type="button" class="btn btn-secondary w-75 mt-3"
                            data-bs-toggle="modal" data-bs-target="#modalTambahBahan">Tambah bahan</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col mx-1">
                        <table class="table table-striped table-light">
                            <thead>
                                <tr>
                                    <th>ID Produk</th>
                                    <th>Nama Bahan</th>
                                    <th>Stok Bahan</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($value as $bhn)
                                <tr>
                                    <td>{{ $bhn->id_bahan }}</td>
                                    <td>{{ $bhn->nama_bahan }}</td>
                                    <td>{{ $bhn->stok_bahan }}</td>
                                    {{-- delete, perlu konfirmasi --}}
                                    {{-- <td>
                                        <form action="#" method="POST">
                                            @csrf
                                            <Input type="hidden" name="id_bahan" value="{{ $bhn->id_bahan }}">
                                            <button type="submit" style="border: none; background: none;"><i
                                                    class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalTambahBahan" tabindex="-1" aria-labelledby="BahanBaru" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="position-relative my-2">
                    <h1 class="fs-5 position-absolute start-50 translate-middle mt-4" id="modalMasuk">Tambah Bahan</h1>
                    <button type="button" class="btn-close position-absolute top-0 end-0 me-2 mt-2"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/tambahBahan" METHOD="POST">
                    @csrf
                    <div class="mx-5 my-4 mt-5 modal-dialog-scrollable">
                        <div class="row input-group">
                            {{-- <label for="bahan" class="form-label">Nama Bahan</label> --}}
                            <input type="text" class="col-8 form-control" id="bahan" name="bahan"
                                placeholder="Nama Bahan Baru" autocomplete="bahan" required>
                            <input type="text" class="col-4 form-control" id="jenisTakaran" name="jenisTakaran"
                                placeholder="gr atau ml" required>
                        </div>
                        <div class="mt-3">
                            <button type="submit"
                                class="btn btn-dark position-relative start-50 translate-middle shadow mt-4"
                                style="border-radius: 1000px; width: 100%;">Tambah</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
