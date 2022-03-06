<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplications', function (Blueprint $table) {
            $table->id();
            $table->integer('tracking')->unique();
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->string('otherArea')->nullable();
            $table->string('subject');
            $table->string('name');
            $table->string('direction');
            $table->string('phone');
            $table->text('petition');
            $table->string('inePdf');
            $table->string('curpPdf');
            $table->enum('status', ['Recibido', 'Atendido'])->default('Recibido');
            $table->string('proofAddressPdf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aplications');
    }
};
