<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionUnidadsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('calificacion_unidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('calificacion_id');
            $table->foreign('calificacion_id')->references('id')->on('calificaciones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('calificacion_unidades');
    }
}
