<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class menuprodukModel extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'menu_produk';

    // Specify the primary key column name if it's different from 'id'
    protected $primaryKey = 'id_menu_produk';

    protected $keyType = 'string';
    public $incrementing = false;

    // If your table has timestamps (created_at, updated_at), set this to true
    public $timestamps = true;

    // Define fillable columns
    protected $fillable = ['id_produk','id_bahan', 'takaran_bahan'];

    public function produk(){
        $sql = "SELECT id_menu_produk, id_produk, id_bahan, takaran_bahan FROM menu_produk ORDER BY id_menu_produk ASC;";
        $value = DB::select($sql);

        return $value;
    }

}
