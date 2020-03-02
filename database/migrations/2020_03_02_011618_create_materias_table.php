<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('clave');
            $table->integer('creditos');

            //Materia pertenece a... carrera o departamentooooko, le ponemos carrera?
            //ya veoo , hummm se supone que los grupos ya tienen asignado los paquetes de las materias
            //pero desconozco si todas las carreras de propedeutico llevan las mismas materias xD
            //okok, vamos a dejarlas libres por ahora jejeookkkayy xD

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
        Schema::dropIfExists('materias');
    }
}
