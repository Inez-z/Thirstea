<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class produkModel extends Model
{
    use HasFactory;

    public function produk(){
        $sql = "SELECT id_produk, nama_produk, modal, harga_jual FROM produk ORDER BY id_produk ASC;";
        $value = DB::select($sql);

        return $value;
    }

}
