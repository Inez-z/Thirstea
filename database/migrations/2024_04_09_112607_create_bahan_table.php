<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahan', function (Blueprint $table) {
            
            $table->string('id_bahan')->primary()->unique();
            $table->string('nama_bahan');
            $table->integer('stok_bahan');
            $table->timestamps();
        });

        DB::unprepared('
            CREATE TRIGGER generate_id_bahan
            BEFORE INSERT ON bahan
            FOR EACH ROW
            BEGIN
                DECLARE id_count INT;
                DECLARE id VARCHAR(5);

                SET id_count = (SELECT COUNT(*) FROM bahan WHERE LEFT(nama_bahan, 2) = LEFT(new.nama_bahan, 2));

                SET id = CONCAT(UPPER(LEFT(new.nama_bahan, 2)), LPAD(id_count + 1, 3, "0"));

                SET NEW.id_bahan = id;
            END;
        ');

        DB::table('bahan')->insert([
            'nama_bahan' => 'Air (ml)',
            'stok_bahan' => '3000',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bahan');
    }
}
