<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\produkModel;
use Illuminate\Support\Facades\Session;

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
}
