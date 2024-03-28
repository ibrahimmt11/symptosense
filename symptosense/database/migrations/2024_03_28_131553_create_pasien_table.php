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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('nama_lengkap');
            $table->char('jenis_kelamin', 1); 
            $table->date('tgl_lahir');
            $table->string('no_telp');
            $table->string('email')->unique();
            $table->text('alamat');
            $table->decimal('tinggi_badan', 5, 2); 
            $table->decimal('berat_badan', 5, 2); 
            $table->string('NIK')->unique();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
