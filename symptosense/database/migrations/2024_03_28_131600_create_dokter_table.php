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
        Schema::create('dokter', function (Blueprint $table) {
            $table->id('id_dokter'); 
            $table->string('nama_lengkap');
            $table->char('jenis_kelamin', 1); 
            $table->date('tgl_lahir');
            $table->string('no_telp');
            $table->string('email')->unique();
            $table->text('alamat');
            $table->string('bukti_str'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};
