<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\transaksiModel;
use App\Models\produkModel;
use App\Models\bahanModel;
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

    // public function getInsertProduk(Request $req){
    //     $idprd = $req->input('id_produk');
    //     $time = now();
    //     $idpengguna = Session::get('id_pengguna');

    //     $model = new transaksiModel;
    //     $valuepenjualan = $model->insertpenjualan($time,$idpengguna);
    //     $idpenjualan = Session::put('id_penjualan',$valuepenjualan[0]->id_penjualan);
    //     $valuetransaksi = $model->inserttransaksi($idprd,$idpenjualan,$time);
    //     $viewdetail = $model->detailviewtransaksi($idpenjualan);
    //     $modelproduk = new produkModel;
    //     $value = $modelproduk->produk();
    //     //sampai sini!!

    //     return view('transaksi',compact('viewdetail','value'));
    // }

    public function inputTransaksiBaru(Request $req){
        $inputIdProduk = $req->input('id_produk');
        $inputHarga = $req->input('harga');

        $input = $inputB . ' (' . $inputTakaran . ')';
        
        bahanModel::create([
            'nama_bahan' => $input
        ]);
        
        return redirect('/transaksipembayaran');
    }

    //search Produk
    public function selectProduct(Request $req){
        $input = $req->input('id_produk');

        $result = produkModel::where('id_produk', $input)->first();
        //value id_produk, nama_produk, harga_jual
        return response()->json($result);
    }

    public function passInput(Request $req){
        $inputs = $req->all();
        // dd($inputs);

        return view('transaksiPembayaran', compact('inputs'));
    }

    public function viewDetailPenjualan(Request $req){
        $inputs = $req->all();
        
        $id_produk = $inputs['id_produk'];
        $jumlah = $inputs['jumlah'];
        $harga = $inputs['harga'];

        $data = [];

        foreach ($id_produk as $key => $value) {
            $namaProduk = produkModel::where('id_produk', $value)->first();
            $data[] = [
                "id_produk" => $value,
                "nama_produk" => $namaProduk['nama_produk'],
                "jumlah" => $jumlah[$key],
                "harga" => $harga[$key]
            ];
        }
        // dd($inputs, $data);

        return view('detailtransaksi2', compact('inputs','data'));
    }

    public function insertPenjualan(Request $req){
        $inputs = $req->all();
        $time = now();
        
        // dd($inputs);
        $transaksiModel = new transaksiModel;
        //insert penjualan
        $penjualanInsert = $transaksiModel->insertNewPenjualan($inputs, $time);

        //insert detail penjualan
        $detailInsert = $transaksiModel->insertPenjualanDetail($inputs, $penjualanInsert, $time);

        // dd($detailInsert);
        //update stok bahan
        $bahanModel = new bahanModel;
        $updateBahan = $bahanModel->updateBahanByPenjualan($inputs, $time);

        return redirect('/transaksi');
    }
}
