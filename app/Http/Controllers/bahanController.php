<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\bahanModel;
use App\Models\pembelianModel;
use Illuminate\Support\Facades\Session;

class bahanController extends Controller
{
    //Request $req digunakan setiap method post


    //untuk verif login
    public function getBahan(){
        
        //panggil Model
        $model = new bahanModel;
        $value = $model->bahan();

        return view('bahan',compact('value'));
        // if($value != NULL){
        //     if($value[0]->status_pengguna == 'owner'){
        //         //Naruh data ke web untuk waktu tertentu
        //         Session::put('status', 'Owner');
        //         Session::put('nama', $value[0]->nama_pengguna);

        //         // return view untuk langsung ke file
        //         // return view('historytransaksi');
                
        //         // return redirect untuk routing ulang
        //         return redirect('/history-transaksi');
        //     }
        // }else{
        //     return redirect('/login');
        // }


    }

    public function inputBahanBaru(Request $req){
        $inputBahan = $req->input('bahan');
        $inputTakaran = $req->input('jenisTakaran');

        $input = $inputBahan . ' (' . $inputTakaran . ')';
        
        bahanModel::create([
            'nama_bahan' => $input
        ]);
        
        return redirect('/bahan');
    } 
}
