<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('semestre_id');
            $table->unsignedBigInteger('carrera_id');
            $table->string('numero');
            $table->datetime('hora_inicio');
            $table->datetime('hora_final');
            //si el semestre al que esta relacionado es eliminado, tambien
            //se borraran los grupos ligados a ese semestre para evitar errores y aja
            $table->foreign('semestre_id')->references('id')->on('semestres')->onDelete('cascade');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
