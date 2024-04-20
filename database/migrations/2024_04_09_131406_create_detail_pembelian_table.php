<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('detail_pembelian', function (Blueprint $table) {
        //     $table->string('id_detail_pembelian')->primary()->unique();
        //     $table->string('id_bahan');
        //     $table->double('jumlah_barang');
        //     $table->double('harga_barang');
        //     $table->date('tanggal_pembelian');
        //     $table->timestamps();

        //     $table->foreign('id_bahan')
        //         ->references('id_bahan')
        //         ->on('bahan');
        // });

        // DB::unprepared('
        //     CREATE TRIGGER generate_id_detail_pembelian
        //     BEFORE INSERT ON detail_pembelian
        //     FOR EACH ROW
        //     BEGIN
        //         DECLARE id_count INT;
        //         DECLARE id VARCHAR(14);

        //         SET id_count = (SELECT COUNT(*) FROM detail_pembelian WHERE LEFT(id_pembelian, 10) = LEFT(new.id_pembelian, 10));

        //         SET id = CONCAT("DB", UPPER(LEFT(new.id_pembelian, 10)), LPAD(id_count + 1, 2, "0"));

        //         SET NEW.id_detail_pembelian = id;
        //     END;
        // ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_pembelian');
    }
}
