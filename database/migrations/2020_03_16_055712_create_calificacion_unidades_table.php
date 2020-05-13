<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('calificacion_unidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('calificacion_id');
            $table->string('unidad');
            $table->boolean('habilitada')->default(false);
            $table->decimal('valor', 5, 2)->default(0);
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
