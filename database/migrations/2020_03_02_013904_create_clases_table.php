<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('materia_id');
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('grupo_id');
            $table->string('materia'); //esta es por si se requiere
            //cambiar como la clave o algo de la
            //materiaokko al momento de asignarla, por default
            //seria el nombre/clave de la materia

            $table->time('hora_inicio');
            $table->time('hora_final');
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
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clases');
    }
}
