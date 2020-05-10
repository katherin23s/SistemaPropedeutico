<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('materia_id');
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('grupo_id');
            $table->string('clave')->unique();
            $table->integer('unidades');
            $table->integer('creditos');
            $table->datetime('hora_inicio');
            $table->datetime('hora_final');
            $table->string('dias');
            $table->string('salon');
            $table->integer('capacidad');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('clases');
    }
}
