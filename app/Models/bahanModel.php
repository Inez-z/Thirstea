<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class bahanModel extends Model
{
    use HasFactory;

    protected $table = 'bahan';

    // Specify the primary key column name if it's different from 'id'
    protected $primaryKey = 'id_bahan';

    protected $keyType = 'string';
    public $incrementing = false;

    // If your table has timestamps (created_at, updated_at), set this to true
    public $timestamps = true;

    // Define fillable columns
    protected $fillable = ['id_bahan', 'nama_bahan', 'stok_bahan'];

    public function bahan(){
        $sql = "SELECT id_bahan, nama_bahan, stok_bahan FROM bahan ORDER BY id_bahan ASC;";
        $value = DB::select($sql);

        return $value;
    }

    public function pembelian()
    {
        return $this->hasMany(pembelianModel::class);
    }

    public function updateBahanByPenjualan($inputs, $time){
        $id_produk = $inputs['id_produk']; // Mendapatkan array id_produk dari $inputs
        $jumlah = $inputs['jumlah']; // Mendapatkan array jumlah dari $inputs
        $subtotal = $inputs['subtotal']; // Mendapatkan array subtotal dari $inputs

        // Membangun kueri UPDATE dengan menggunakan loop foreach
        for ($i = 0; $i < count($id_produk); $i++) {
            $query = "UPDATE bahan ".
            "JOIN menu_produk ON bahan.id_bahan = menu_produk.id_bahan ".
            "JOIN detail_penjualan ON detail_penjualan.id_produk = menu_produk.id_produk ".
            "SET bahan.stok_bahan = bahan.stok_bahan - (menu_produk.takaran_bahan * ".$jumlah[$i]."), ".
            "bahan.updated_at = NOW() ".
            "WHERE detail_penjualan.id_produk = '".$id_produk[$i]."';";
            // dd($query);
            $result = DB::update($query); 
        }

        // dd($query);

        // $query = `UPDATE bahan
        // JOIN menu_produk ON bahan.id_bahan = menu_produk.id_bahan
        // JOIN detail_penjualan ON detail_penjualan.id_produk = menu_produk.id_produk
        // SET bahan.stok_bahan = bahan.stok_bahan - (menu_produk.takaran_bahan * detail_penjualan.jumlah_produk),
        //     bahan.updated_at = NOW()
        // WHERE detail_penjualan.id_produk IN (
        //     SELECT id_produk FROM menu_produk
        // );`; 
        // $update = DB::update($query);

        return $result;
    }
}
