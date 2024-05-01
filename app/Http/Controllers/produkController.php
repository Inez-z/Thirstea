<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\produkModel;
use App\Models\menuprodukModel;
use App\Models\bahanModel;
use App\Models\pembelianModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class produkController extends Controller
{
    //Request $req digunakan setiap method post


    //untuk verif login
    public function getProduk(){
        
        //panggil Model
        $model = new produkModel;
        $value = $model->produk();

        return view('produk',compact('value'));
    }

    public function getListMenu(){

        $model = new produkModel;
        $value = $model->produk();

        return view('transaksi',compact('value'));
    }

    public function formProduk(){

        // $value = bahanModel::all();
        // Retrieve all pembelian records with their associated products
        $pembelianWithProducts = DB::table('pembelian')
                            ->join('bahan', function ($join) {
                                $join->on('bahan.id_bahan', '=', 'pembelian.id_bahan')
                                    ->whereRaw('pembelian.created_at = (SELECT MIN(created_at) FROM pembelian WHERE pembelian.id_bahan = bahan.id_bahan)');
                            })
                            ->get();

        // dd($pembelianWithProducts);
        // $hppPerProduk[] = '';
        $value = [];
        // dd($pembelianWithProducts);
        foreach ($pembelianWithProducts as $totalhpp) {
            // Calculate the HPP per product
            $hpp = $totalhpp->total_harga / $totalhpp->jumlah_barang;
        
            // Create an array to hold the HPP and product name
            $hppData = [
                'total_harga_per_produk' => $hpp,
                'nama_bahan' => $totalhpp->nama_bahan,
                'id_bahan' => $totalhpp->id_bahan
            ];
        
            // Push the HPP data into the $hppPerProduk array
            $value[] = $hppData;
        }
        
        // Output the $hppPerProduk array
        // dd($value);
        // $totalhpp = $pembelianWithProducts[];
        return view('tambahproduk',compact('value'));   
    }

    
    public function insertProduk(Request $request){
        
        $insert = $request->all();
        // dd($insert);
        // dd($insert['bahan'][0], $insert['bahan']);
        //panggil Model
        $produk = produkModel::create([
            'nama_produk' => $insert['produk'],
            'harga_jual' => $insert['hargajual'],
            'modal' => $insert['HPP']
        ]);

        $produk = produkModel::latest()->first();

        $i = 0;
        foreach($insert['bahan'] as $menuProduk){
            menuprodukModel::create([
                'id_bahan' => $insert['bahan'][$i],
                'id_produk' => $produk->id_produk,
                'takaran_bahan' => $insert['qty'][$i]
            ]);
            $i++;
        }

        // $stok = bahanModel::select("stok_bahan")->where("id_bahan",$insert['bahan'])->get();
        // $updatestok = $stok[0]->stok_bahan+$insert['stokbahan'];

        // bahanModel::where('id_bahan', $insert['bahan'])->update([
        //     'stok_bahan' => $updatestok
        // ]);

        return redirect('/produk');
        
    }
}
