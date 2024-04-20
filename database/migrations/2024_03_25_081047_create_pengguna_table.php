<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->string('id_pengguna')->primary()->unique();
            $table->string('nama_pengguna');
            $table->string('email_pengguna')->unique();
            $table->string('password_pengguna');
            $table->enum('status_pengguna', ['owner', 'pegawai'])->default('pegawai');
            $table->timestamps();
        });

        DB::unprepared('
            CREATE TRIGGER generate_id_pengguna
            BEFORE INSERT ON pengguna
            FOR EACH ROW
            BEGIN
                DECLARE id_count INT;
                DECLARE id_code VARCHAR(10);

                SET id_count = (SELECT COUNT(*) FROM pengguna WHERE LEFT(nama_pengguna, 2) = LEFT(new.nama_pengguna, 2));

                SET id_code = CONCAT(UPPER(LEFT(new.nama_pengguna, 2)), LPAD(id_count + 1, 3, "0"));

                SET NEW.id_pengguna = id_code;
            END;
        ');

        DB::table('pengguna')->insert([
            'nama_pengguna' => 'Inez',
            'email_pengguna' => 'hiiminz01@gmail.com',
            'password_pengguna' => bcrypt('Hello123'),
            'status_pengguna' => 'owner',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('pengguna')->insert([
            'nama_pengguna' => 'Bryant',
            'email_pengguna' => 'bryant@gmail.com',
            'password_pengguna' => bcrypt('Hello123'),
            'status_pengguna' => 'pegawai',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS generate_id_pengguna');
        Schema::dropIfExists('pengguna');
    }
};
