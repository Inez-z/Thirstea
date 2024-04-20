<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->string('id_produk')->primary()->unique();
            $table->string('nama_produk');
            $table->double('modal');
            $table->double('harga_jual');
            $table->timestamps();
        });

        DB::unprepared('
        CREATE TRIGGER generate_id_produk
        BEFORE INSERT ON produk
        FOR EACH ROW
        BEGIN
            DECLARE id_count INT;
            DECLARE id VARCHAR(5);

            SET id_count = (SELECT COUNT(*) FROM produk WHERE LEFT(nama_produk, 2) = LEFT(new.nama_produk, 2));

            SET id = CONCAT(UPPER(LEFT(new.nama_produk, 2)), LPAD(id_count + 1, 3, "0"));

            SET NEW.id_produk = id;
        END;
    ');

    DB::table('produk')->insert([
        'nama_produk' => 'Es Teh Raksasa',
        'modal' => '3000',
        'harga_jual' => '5000',
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
        Schema::dropIfExists('produk');
    }
}
