<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->string('id_pembelian')->primary()->unique();
            $table->string('id_bahan');
            $table->double('jumlah_barang');
            $table->double('harga_barang');
            $table->date('tanggal_pembelian');
            $table->timestamps();
            
            $table->foreign('id_bahan')
                ->references('id_bahan')
                ->on('bahan');
        });

        DB::unprepared('
            CREATE TRIGGER generate_id_pembelian
            BEFORE INSERT ON pembelian
            FOR EACH ROW
            BEGIN
                DECLARE id_count INT;
                DECLARE id VARCHAR(11);
                DECLARE tanggal_input CHAR(8);

                SET tanggal_input = DATE_FORMAT(NEW.tanggal_pembelian, "%Y%m%d");

                SET id_count = (SELECT COUNT(*) FROM pembelian WHERE LEFT(id_pembelian, 9) = CONCAT("B", LEFT(tanggal_input COLLATE utf8mb4_unicode_ci, 8))
);

                SET id = CONCAT("B", LEFT(tanggal_input, 8), LPAD(id_count + 1, 2, "0"));

                SET NEW.id_pembelian = id;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian');
    }
}
