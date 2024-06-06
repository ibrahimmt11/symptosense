<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_diagnosis');
            $table->string('meeting_link')->nullable();
            $table->enum('status', ['scheduled', 'active', 'completed']);
            $table->dateTime('scheduled_time')->nullable();
            $table->timestamps();

            $table->foreign('id_diagnosis')->references('id_diagnosis')->on('diagnosis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
};
