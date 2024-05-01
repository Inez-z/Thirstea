<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
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
                    <h3 class="card-title mt-3 ms-2 mb-3 fw-bold">Tambah produk baru</h3>
                </div>
                <div class="row mt-3">
                    <form action="/insertproduk" method="POST" id="myForm">
                        @csrf
                        <div class="col ps-2">
                            <div class="ps-2">
                                <div class="mb-3 mt-3">
                                    <label for="produk" class="col-8 form-label">Nama produk</label>
                                    <input type="text" class="col-8 form-control" id="produk"
                                        placeholder="Masukkan nama produk" name="produk" required>
                                </div>
                                <div class="row">
                                    <label for="status" class="col-4 form-label">Bahan pembuatan</label>
                                    <a class="col-4 text-end" href="#" onclick="tambahBaris()"><i
                                            class="bi bi-plus-circle-fill"></i></a>
                                    <label for="status" class="col-4 form-label">Harga Pokok Penjualan</label>
                                </div>
                                <div class="row">
                                        <table id="tabelBahan">
                                            <!-- Inside the table row -->
                                            <tr>
                                                <td>
                                                    <select class="form-select col-6 bahan" name="bahan[]" required>
                                                        <option value=""></option>
                                                        @foreach ($value as $bahan)
                                                            <option value="{{ $bahan['id_bahan'] }}"
                                                                data-harga="{{ $bahan['total_harga_per_produk'] }}">
                                                                {{ $bahan['nama_bahan'] }}
                                                                ({{ $bahan['total_harga_per_produk'] }})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="number" class="form-control qty" placeholder="Qty"
                                                        name="qty[]" required></td>
                                                <td><input type="number" class="form-control HPP"
                                                        placeholder="Harga Pokok" name="HPP[]" readonly></td>
                                            </tr>

                                        </table>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-8"></div>
                                    <div class="col-4">
                                        <label for="totalHpp" class="form-label">Total HPP/gelas</label>
                                        <input type="number" class="form-control" id="totalHpp"
                                            placeholder="Harga Pokok" name="HPP">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="pwd" class="form-label">Harga jual</label>
                                    <input type="number" class="form-control" id="pwd"
                                        placeholder="Masukkan harga jual" name="hargajual" required>
                                </div>
                                <div class="row">
                                    <div class="col"></div>
                                    <div class="col text-end">
                                        <button type="submit" class="btn w-50 mt-3 py-3 fw-bold"
                                            style="background-color:#535353; color:#FFFFFF;">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function tambahBaris() {
            var table = document.getElementById("tabelBahan");
            var row = table.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);

            // Construct the HTML elements for the new row
            cell1.innerHTML = '<select class="form-select col-6 bahan" name="bahan[]" required>' +
                '<option value=""></option>' +
                '@foreach ($value as $bahan)' +
                '<option value="{{ $bahan['id_bahan'] }}" data-harga="{{ $bahan['total_harga_per_produk'] }}">' +
                '{{ $bahan['nama_bahan'] }} ({{ $bahan['total_harga_per_produk'] }})' +
                '</option>' +
                '@endforeach' +
                '</select>';

            cell2.innerHTML = '<input type="number" class="form-control qty" placeholder="Qty" name="qty[]" required>';
            cell3.innerHTML =
                '<input type="number" class="form-control HPP" placeholder="Harga Pokok" name="HPP[]" readonly>';

            // Attach event listeners to the newly added bahan and qty inputs
            addEventListeners();
        }


        function addEventListeners() {
            var bahanInputs = document.querySelectorAll('.bahan');
            bahanInputs.forEach(function(bahanInput) {
                bahanInput.addEventListener('change', function() {
                    hitungHPP(this); // Call hitungHPP when either bahan or qty changes
                });
            });

            var qtyInputs = document.querySelectorAll('.qty');
            qtyInputs.forEach(function(qtyInput) {
                qtyInput.addEventListener('input', function() {
                    hitungHPP(this); // Call hitungHPP when either bahan or qty changes
                });
            });
        }

        // Function to calculate HPP for a specific row
        function hitungHPP(input) {
            var row = input.parentNode.parentNode;
            var bahanSelect = row.querySelector('.bahan');
            var qtyInput = row.querySelector('.qty');
            var hppInput = row.querySelector('.HPP');

            var hargaPokokPerProduk = parseFloat(bahanSelect.options[bahanSelect.selectedIndex].getAttribute('data-harga'));
            var qtyValue = parseFloat(qtyInput.value);

            if (!isNaN(hargaPokokPerProduk) && !isNaN(qtyValue)) {
                var totalHPP = hargaPokokPerProduk * qtyValue;
                // Format the total HPP to IDR currency
                var formattedHPP = formatToIDR(totalHPP);
                hppInput.value = totalHPP;
            } else {
                hppInput.value = ''; // Clear the HPP input if either bahan or qty is not filled
            }
        }

        // Function to format a number to IDR currency format
        function formatToIDR(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(number);
        }

        // Call addEventListeners function to attach event listeners to all input fields
        addEventListeners();


        // Function to calculate total HPP from all HPP inputs
        function calculateTotalHPP() {
            var totalHPP = 0;
            var hppInputs = document.querySelectorAll('.HPP');
            hppInputs.forEach(function(hppInput) {
                if (!isNaN(parseFloat(hppInput.value))) {
                    totalHPP += parseFloat(hppInput.value);
                }
            });

            // Update the total HPP input with the calculated value
            var totalHPPInput = document.getElementById('totalHpp');
            totalHPPInput.value = totalHPP.toFixed(2); // Format total HPP to two decimal places
        }

        // Function to calculate HPP for a specific row
        function hitungHPP(input) {
            var row = input.parentNode.parentNode;
            var bahanSelect = row.querySelector('.bahan');
            var qtyInput = row.querySelector('.qty');
            var hppInput = row.querySelector('.HPP');

            var hargaPokokPerProduk = parseFloat(bahanSelect.options[bahanSelect.selectedIndex].getAttribute('data-harga'));
            var qtyValue = parseFloat(qtyInput.value);

            if (!isNaN(hargaPokokPerProduk) && !isNaN(qtyValue)) {
                var totalHPP = hargaPokokPerProduk * qtyValue;
                // Format the total HPP to IDR currency
                var formattedHPP = formatToIDR(totalHPP);
                hppInput.value = totalHPP.toFixed(2); // Update the HPP value
            } else {
                hppInput.value = ''; // Clear the HPP input if either bahan or qty is not filled
            }

            // Calculate total HPP after updating HPP value
            calculateTotalHPP(); // Recalculate total HPP
        }
    </script>
</body>

</html>
