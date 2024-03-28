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
        Schema::create('verifikasi', function (Blueprint $table) {
            $table->id('id_diagnosis'); // Primary key and auto-incrementing
            $table->string('nama_diagnosis');
            $table->text('hasil_diagnosis');
            $table->unsignedBigInteger('id_dokter');
            $table->string('status');
            $table->string('dokumen'); // Assuming 'dokumen' is a string, adjust the data type if different

            // Define foreign keys if necessary
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifikasi');
    }
};
