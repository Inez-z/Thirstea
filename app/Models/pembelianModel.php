<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class pembelianModel extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'pembelian';

    // Specify the primary key column name if it's different from 'id'
    protected $primaryKey = 'id_pembelian';

    protected $keyType = 'string';
    public $incrementing = false;

    // If your table has timestamps (created_at, updated_at), set this to true
    public $timestamps = true;

    // Define fillable columns
    protected $fillable = ['id_bahan', 'jumlah_barang', 'total_harga', 'tanggal_pembelian'];

    public function pembelian(){
        $sql = "SELECT `id_pembelian`,`tanggal_pembelian`,`bahan`.`id_bahan`,`nama_bahan`,`jumlah_barang`,`total_harga` FROM `pembelian`, `bahan` WHERE `pembelian`.`id_bahan`=`bahan`.`id_bahan` ORDER BY `pembelian`.`id_pembelian` DESC;";
        $value = DB::select($sql);

        return $value;
    }

    public function bahan()
    {
        return $this->belongsTo(BahanModel::class, 'id_bahan');
    }

}
