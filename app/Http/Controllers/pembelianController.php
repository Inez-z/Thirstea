<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\pembelianModel;
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
}
