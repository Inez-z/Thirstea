<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stock_opname', function (Blueprint $table) {
            $table->string('id_stock_opname')->primary()->unique();
            $table->string('id_produk');
            $table->date('tanggal_so');
            $table->double('penambahan');
            $table->double('pengurangan');
            $table->double('stock_akhir');
            $table->timestamps();

            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk');
        });

        DB::unprepared('
            CREATE TRIGGER generate_id_so
            BEFORE INSERT ON stock_opname
            FOR EACH ROW
            BEGIN
                DECLARE id_count INT;
                DECLARE id VARCHAR(15);
                DECLARE tanggal_input CHAR(8);

                SET tanggal_input = DATE_FORMAT(NEW.tanggal_so, "%Y%m%d");

                SET id_count = (SELECT COUNT(*) FROM stock_opname WHERE LEFT(id_stock_opname, 13) = CONCAT(LEFT(tanggal_input COLLATE utf8mb4_unicode_ci, 8),LEFT(new.id_produk, 5)));

                SET id = CONCAT(LEFT(tanggal_input, 8),LEFT(new.id_produk, 5), LPAD(id_count + 1, 2, "0"));

                SET NEW.id_stock_opname = id;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_opname');
    }
};
