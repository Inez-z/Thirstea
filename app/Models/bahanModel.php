<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class bahanModel extends Model
{
    use HasFactory;

    public function bahan(){
        $sql = "SELECT id_bahan, nama_bahan, stok_bahan FROM bahan ORDER BY id_bahan ASC;";
        $value = DB::select($sql);

        return $value;
    }
}
