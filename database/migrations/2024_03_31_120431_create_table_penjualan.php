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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->string('id_penjualan')->primary()->unique();
            $table->date('tanggal');
            $table->time('jam');
            $table->decimal('total', 10, 0);
            $table->string('metode_pembayaran');
            $table->string('id_pengguna');
            $table->timestamps();

            $table->foreign('id_pengguna')
                  ->references('id_pengguna')
                  ->on('pengguna');
        });
        DB::unprepared('
            CREATE TRIGGER generate_id_penjualan
            BEFORE INSERT ON penjualan
            FOR EACH ROW
            BEGIN
                DECLARE tanggal_transaksi CHAR(8);
                DECLARE inisial CHAR(1);
                DECLARE next_id INT;

                -- Mendapatkan tanggal transaksi dalam format yyyymmdd
                SET tanggal_transaksi = DATE_FORMAT(NEW.tanggal, "%Y%m%d");

                -- Mendapatkan inisial dari metode pembayaran
                SET inisial = UPPER(SUBSTRING(NEW.metode_pembayaran COLLATE utf8mb4_unicode_ci, 1, 1));

                -- Menghitung jumlah transaksi dengan inisial yang sama pada tanggal yang sama
                SET next_id = COALESCE((SELECT MAX(SUBSTRING(id_penjualan COLLATE utf8mb4_unicode_ci, 10) + 1) FROM penjualan WHERE SUBSTRING(id_penjualan COLLATE utf8mb4_unicode_ci, 1, 9) = CONCAT(inisial, tanggal_transaksi)), 1);

                -- Menghasilkan ID baru
                SET NEW.id_penjualan = CONCAT(inisial, tanggal_transaksi, LPAD(next_id, 3, "0"));
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
