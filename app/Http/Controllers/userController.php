<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use Illuminate\Support\Facades\Session;


class userController extends Controller
{
    //Request $req digunakan setiap method post


    //untuk verif login
    public function validate(Request $req){
        //manggil value dari input di view
        $uname = $req->input('username');
        $pass = $req->input('password');

        //panggil Model
        $model = new userModel;
        $value = $model->validateUser($uname, $pass);

        if($value != NULL){
            if($value[0]->status_pengguna == 'owner'){
                //Naruh data ke web untuk waktu tertentu
                Session::put('status', 'Owner');
                Session::put('nama', $value[0]->nama_pengguna);
                Session::put('id_pengguna', $value[0]->id_pengguna);
                // return view untuk langsung ke file
                // return view('historytransaksi');
                
                // return redirect untuk routing ulang
                return redirect('/history-transaksi');
            }
            //'pegawai' dlm database : $value[0]->status_pengguna
            if($value[0]->status_pengguna == 'pegawai'){
                //Naruh data ke web untuk waktu tertentu
                //'Pegawai' dari input sendiri
                Session::put('status', 'Pegawai');
                Session::put('nama', $value[0]->nama_pengguna);
                Session::put('id_pengguna', $value[0]->id_pengguna);
                // return view untuk langsung ke file
                // return view('historytransaksi');
                
                // return redirect untuk routing ulang
                return redirect('/buka-shift');
            }
        }else{
            return redirect('/login');
        }

        
    }

    public function logout(Request $req){
        Session::flush();

        return redirect('/');
    }
}
