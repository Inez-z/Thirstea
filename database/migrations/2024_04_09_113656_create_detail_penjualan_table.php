<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penjualan', function (Blueprint $table) {
            $table->string('id_detail_penjualan')->primary()->unique();
            $table->string('id_penjualan');
            $table->string('id_produk');
            $table->integer('jumlah_produk');
            $table->tinyInteger('delete_detail');//untuk delete logical kalau remove produk dari penjualan(supaya id tidak bentrok)
            $table->timestamps();

            $table->foreign('id_penjualan')
                  ->references('id_penjualan')
                  ->on('penjualan');
            $table->foreign('id_produk')
                  ->references('id_produk')
                  ->on('produk');
        });

        DB::unprepared('
            CREATE TRIGGER generate_id_detail_penjualan
            BEFORE INSERT ON detail_penjualan
            FOR EACH ROW
            BEGIN
                DECLARE id_count INT;
                DECLARE id VARCHAR(14);

                SET id_count = (SELECT COUNT(*) FROM detail_penjualan WHERE LEFT(id_penjualan, 10) = LEFT(new.id_penjualan, 10));

                SET id = CONCAT("DJ", UPPER(LEFT(new.id_penjualan, 10)), LPAD(id_count + 1, 2, "0"));

                SET NEW.id_detail_penjualan = id;
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
        Schema::dropIfExists('detail_penjualan');
    }
}
