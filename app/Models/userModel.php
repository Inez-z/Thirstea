<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class userModel extends Model
{
    use HasFactory;

    public function validateUser($uname, $pass){
        $hashedPassword = DB::table('pengguna')->where('email_pengguna', $uname)->orWhere('nama_pengguna', $uname)->value('password_pengguna');

        if($hashedPassword != NULL){
            if(Hash::check($pass, $hashedPassword)){
                $sql = "SELECT id_pengguna, nama_pengguna, email_pengguna, status_pengguna FROM pengguna WHERE `email_pengguna` = '".$uname."' OR `nama_pengguna` = '".$uname."';";
                $value = DB::select($sql);

                //SELECT 

                return $value;
            }else{
                return false;
            }
        }

        return false;
    }
}
