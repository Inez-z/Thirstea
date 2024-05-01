<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class soModel extends Model
{
    use HasFactory;


    // Specify the table associated with the model
    protected $table = 'stock_opname';

    // Specify the primary key column name if it's different from 'id'
    protected $primaryKey = 'id_stock_opname';

    protected $keyType = 'string';
    public $incrementing = false;

    // If your table has timestamps (created_at, updated_at), set this to true
    public $timestamps = true;

    // Define fillable columns
    protected $fillable = ['id_produk', 'tanggal_so', 'penambahan', 'pengurangan', 'stock_akhir'];

    

}
