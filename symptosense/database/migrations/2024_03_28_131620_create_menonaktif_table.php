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
        Schema::create('menonaktif', function (Blueprint $table) {
            $table->id(); // Primary key otomatis
            $table->unsignedBigInteger('id_dokter');
            $table->unsignedBigInteger('id_pasien');
            $table->date('tgl_bergabung');
            $table->string('status');

            // Set foreign key constraints
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter')->onDelete('cascade');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');

            $table->timestamps(); // Opsional, untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menonaktif');
    }
};
