<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class transaksiModel extends Model
{
    use HasFactory;

    public function penjualan(){
        $sql = "SELECT `id_penjualan`,DATE_FORMAT(`tanggal`,'%e %M %Y') as `tanggal`,`jam`,`total`,`metode_pembayaran`,`pengguna`.`nama_pengguna` FROM `penjualan`,`pengguna` WHERE `penjualan`.`id_pengguna`=`pengguna`.`id_pengguna` ORDER BY `penjualan`.`tanggal` DESC, `penjualan`.`jam` DESC;";
        $value = DB::select($sql);

        return $value;
    }

    public function detailtransaksi($idp){
        $sql = "SELECT DATE_FORMAT(`penjualan`.`tanggal`,'%e %M %Y') as `tanggal`,`penjualan`.`id_penjualan`,`produk`.`nama_produk`,`detail_penjualan`.`jumlah_produk`,(`detail_penjualan`.`jumlah_produk`*`produk`.`harga_jual`) as `Subtotal`,`penjualan`.`total`,`penjualan`.`uang_diterima`,(`penjualan`.`uang_diterima`-`penjualan`.`total`) as `Kembalian`, `penjualan`.`metode_pembayaran`".
        "FROM `detail_penjualan`,`penjualan`,`produk` ".
        "WHERE `produk`.`id_produk`=`detail_penjualan`.`id_produk` AND `penjualan`.`id_penjualan`=`detail_penjualan`.`id_penjualan` AND `penjualan`.`id_penjualan`='".$idp."'".
        "ORDER BY `detail_penjualan`.`id_detail_penjualan` ASC;";
        $value = DB::select($sql);

        return $value;
    }

    public function insertpenjualan($time,$idpengguna){
        $sql = "INSERT INTO `penjualan`(`tanggal`, `jam`, `total`, `uang_diterima`, `metode_pembayaran`, `id_pengguna`, `created_at`, `updated_at`) VALUES ('".$time."','".$time."','0','0','Belum Dibayar','".$idpengguna."','".$time."','".$time."')";
        $value = DB::insert($sql);
        $sql = "SELECT `id_penjualan` FROM `penjualan` WHERE `tanggal`='".$time."' AND `id_pengguna`='".$idpengguna."'";
        $value = DB::select($sql);

        return $value;
    }

    public function inserttransaksi($idprd,$idpenjualan,$time){
        $sql = "INSERT INTO `detail_penjualan`(`id_penjualan`, `id_produk`, `jumlah_produk`, `created_at`, `updated_at`) VALUES ('".$idpenjualan."','".$idprd."','1','".$time."','".$time."')";
        $value = DB::insert($sql);

        return $value;
    }

    public function detailviewtransaksi($idpenjualan){
        $sql = "SELECT `id_penjualan`, `produk`.`nama_produk`, `jumlah_produk` FROM `detail_penjualan`,`produk` WHERE `id_penjualan`='".$idpenjualan."' AND `produk`.`id_produk`=`detail_penjualan`.`id_produk`";
        $value = DB::select($sql);

        return $value;
    }


    public function insertNewPenjualan($inputs, $time){
        list($tanggal, $waktu) = explode(' ', $inputs['tanggal']);//untuk pisah tanggal dan jam
        $sql = "INSERT INTO `penjualan`(`tanggal`, `jam`, `total`, `uang_diterima`, `metode_pembayaran`, `id_pengguna`, `created_at`, `updated_at`) VALUES ('".$tanggal."','".$waktu."','".$inputs['totalHarga']."','".$inputs['uangTerima']."','".$inputs['metode']."','".Session::get('id_pengguna')."','".$time."','".$time."')";
        $insert = DB::insert($sql);

        $id_penjualan = DB::table('penjualan')->orderBy('id_penjualan', 'desc')->first();

        return $id_penjualan;
    }

    public function insertPenjualanDetail($inputs, $penjualanInsert, $time){
        // $sql = "INSERT INTO `detail_penjualan`(`id_penjualan`, `id_produk`, `jumlah_produk`, `created_at`, `updated_at`) VALUES ('".$penjualanInsert->id_penjualan."','[value-3]','[value-4]','[value-5]','[value-6]')";

        foreach ($inputs['id_produk'] as $key => $id_produk) {
            $jumlah = $inputs['jumlah'][$key];
            
            // Lakukan operasi insert ke dalam database untuk setiap pasangan nilai
            $insert = DB::table('detail_penjualan')->insert([
                'id_penjualan' => $penjualanInsert->id_penjualan,
                'id_produk' => $id_produk,
                'jumlah_produk' => $jumlah,
                'created_at' => $time,
                'updated_at' => $time
            ]);
        }
        
        return $insert;
    }
}
