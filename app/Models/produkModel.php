<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class produkModel extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'produk';

    // Specify the primary key column name if it's different from 'id'
    protected $primaryKey = 'id_produk';

    protected $keyType = 'string';
    public $incrementing = false;

    // If your table has timestamps (created_at, updated_at), set this to true
    public $timestamps = true;

    // Define fillable columns
    protected $fillable = ['nama_produk', 'harga_jual', 'modal'];

    public function produk(){
        $sql = "SELECT id_produk, nama_produk, modal, harga_jual FROM produk ORDER BY id_produk ASC;";
        $value = DB::select($sql);

        return $value;
    }

}
