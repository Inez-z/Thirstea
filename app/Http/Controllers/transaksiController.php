<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\transaksiModel;
use App\Models\produkModel;
use Illuminate\Support\Facades\Session;

class transaksiController extends Controller
{
    //Request $req digunakan setiap method post


    //untuk verif login
    public function getHistoryTransaksi(){
        
        //panggil Model
        $model = new transaksiModel;
        $value = $model->penjualan();

        return view('historyTransaksi',compact('value'));
    }

    public function getDetailTransaksi(Request $req){
        
        $idp = $req->input('id_penjualan');
        //panggil Model
        $model = new transaksiModel;
        $value = $model->detailtransaksi($idp);
        // dd($value);
        return view('detailtransaksi',compact('value'));
    }

    public function getInsertProduk(Request $req){
        $idprd = $req->input('id_produk');
        $time = now();
        $idpengguna = Session::get('id_pengguna');

        $model = new transaksiModel;
        $valuepenjualan = $model->insertpenjualan($time,$idpengguna);
        $idpenjualan = Session::put('id_penjualan',$valuepenjualan[0]->id_penjualan);
        $valuetransaksi = $model->inserttransaksi($idprd,$idpenjualan,$time);
        $viewdetail = $model->detailviewtransaksi($idpenjualan);
        $modelproduk = new produkModel;
        $value = $modelproduk->produk();
        //sampai sini!! :)

        return view('transaksi',compact('viewdetail','value'));
    }
}
