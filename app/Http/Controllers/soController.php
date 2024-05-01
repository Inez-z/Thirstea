<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\produkModel;
use App\Models\menuprodukModel;
use App\Models\bahanModel;
use App\Models\pembelianModel;
use App\Models\soModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class soController extends Controller
{
    public function calculateSO(){
        $SO = bahanModel::all();
        // dd($SO);
        return view('tambahso');
    }
}
