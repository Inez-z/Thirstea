<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\pembelianModel;
use App\Models\bahanModel;
use Illuminate\Support\Facades\Session;

class pembelianController extends Controller
{
    //Request $req digunakan setiap method post


    //untuk verif login
    public function getPembelian(){
        
        //panggil Model
        $model = new pembelianModel;
        $value = $model->pembelian();

        return view('pembelian',compact('value'));
        
    }

    public function formPembelian()
    {
       
        $value = bahanModel::all();

        return view('tambahpembelian',compact('value'));   
    }

    public function insertPembelian(Request $request){
        
        $insert = $request->all();
        //panggil Model
        pembelianModel::create([
            'tanggal_pembelian' => DATE($insert['tanggal']),
            'id_bahan' => $insert['bahan'],
            'jumlah_barang' => $insert['stokbahan'],
            'total_harga' => $insert['hargabeli']
        ]);

        $stok = bahanModel::select("stok_bahan")->where("id_bahan",$insert['bahan'])->get();
        $updatestok = $stok[0]->stok_bahan+$insert['stokbahan'];

        bahanModel::where('id_bahan', $insert['bahan'])->update([
            'stok_bahan' => $updatestok
        ]);

        return redirect('/pembelian');
        
    }

}
