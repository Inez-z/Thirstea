<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_produk', function (Blueprint $table) {
            $table->string('id_menu_produk')->primary()->unique();
            $table->string('id_produk');
            $table->string('id_bahan');
            $table->integer('takaran_bahan');
            $table->timestamps();

            $table->foreign('id_produk')
            ->references('id_produk')
            ->on('produk');
    
            $table->foreign('id_bahan')
            ->references('id_bahan')
            ->on('bahan');
        });

        DB::unprepared('
            CREATE TRIGGER generate_id_menu
            BEFORE INSERT ON menu_produk
            FOR EACH ROW
            BEGIN
                DECLARE id_count INT;
                DECLARE id VARCHAR(12);

                SET id_count = (SELECT COUNT(*) FROM menu_produk WHERE LEFT(id_menu_produk, 10) = CONCAT(LEFT(new.id_produk, 5), LEFT(new.id_bahan, 5)));

                SET id = CONCAT(UPPER(LEFT(new.id_produk, 5)), UPPER(LEFT(new.id_bahan, 5)), LPAD(id_count + 1, 2, "0"));

                SET NEW.id_menu_produk = id;
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
        Schema::dropIfExists('menu_produk');
    }
}
