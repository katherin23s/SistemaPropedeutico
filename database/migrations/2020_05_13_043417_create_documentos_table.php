<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('alumno_id');
            $table->string('nombre');
            $table->date('fecha');
            $table->string('ubicacion');
            $table->tinyInteger('estado')->default(0);
            $table->text('comentarios')->nullable();
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
