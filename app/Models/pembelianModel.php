<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pembelianModel extends Model
{
    use HasFactory;

    public function pembelian(){
        $sql = "SELECT `id_pembelian`,`tanggal_pembelian`,`bahan`.`nama_bahan`,`jumlah_barang`,`total_harga` FROM `pembelian`, `bahan` WHERE `pembelian`.`id_bahan`=`bahan`.`id_bahan` ORDER BY `pembelian`.`tanggal_pembelian` DESC;";
        $value = DB::select($sql);

        return $value;
    }
}
