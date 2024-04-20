<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiKasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_kas', function (Blueprint $table) {
            $table->string('id_kas')->primary()->unique();
            $table->string('id_pengguna');
            $table->double('kas_awal');
            $table->double('kas_akhir');
            $table->date('tanggal_kas');
            $table->timestamps();

            $table->foreign('id_pengguna')
            ->references('id_pengguna')
            ->on('pengguna');
        });

        DB::unprepared('
            CREATE TRIGGER generate_id_kas
            BEFORE INSERT ON informasi_kas
            FOR EACH ROW
            BEGIN
                DECLARE id_count INT;
                DECLARE id VARCHAR(15);
                DECLARE tanggal_input CHAR(8);

                SET tanggal_input = DATE_FORMAT(new.tanggal_kas, "%Y%m%d");

                SET id_count = (SELECT COUNT(*) FROM informasi_kas WHERE LEFT(tanggal_kas, 8) = LEFT(new.tanggal_kas, 8) AND id_pengguna = new.id_pengguna);

                SET id = CONCAT(UPPER(LEFT(tanggal_input, 8)), new.id_pengguna, LPAD(id_count + 1, 2, "0"));

                SET NEW.id_kas = id;
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
        Schema::dropIfExists('informasi_kas');
    }
}
