<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\userController;

Route::get('/sidebar', function(){
    return view('sidebar');
});

Route::get('/buka-shift', function(){
    return view('Pegawai.bukashift');
});

Route::get('/tutup-shift', function(){
    return view('Pegawai.tutupshift');
});



Route::get('/bahan', function(){
    return view('bahan');
});

Route::get('/stockopname', function(){
    return view('stockopname');
});

Route::get('/buatakun', function(){
    return view('buatakun');
});

Route::get('/formakun', function(){
    return view('formakun');
});

Route::get('/transaksipembayaran', function(){
    return view('transaksipembayaran');
});

Route::get('/tambahproduk', function(){
    return view('tambahproduk');
});

Route::get('/tambahpembelian', function(){
    return view('tambahpembelian');
});

Route::get('/tambahso', function(){
    return view('tambahso');
});

Route::get('/editso', function(){
    return view('editso');
});

Route::get('/laporan', function(){
    return view('laporan');
});

Route::get('/', function(){
    return view('login');
});

Route::prefix('login')->group(function(){
    Route::get('', function() {
        return view('login');
    });
    Route::post('/validate', 'App\Http\Controllers\userController@validate');
    Route::get('/clear', 'App\Http\Controllers\userController@logout');
});

Route::get('/history-transaksi', 'App\Http\Controllers\transaksiController@getHistoryTransaksi');

Route::get('/bahan', 'App\Http\Controllers\bahanController@getBahan');

Route::get('/produk', 'App\Http\Controllers\produkController@getProduk');

Route::get('/pembelian', 'App\Http\Controllers\pembelianController@getPembelian');

Route::post('/detailtransaksi', 'App\Http\Controllers\transaksiController@getDetailTransaksi');

Route::get('/transaksi', 'App\Http\Controllers\produkController@getListMenu');

Route::post('/insertproduk', 'App\Http\Controllers\transaksiController@getInsertProduk');