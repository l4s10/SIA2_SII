<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facultades', function (Blueprint $table) {
            $table->increments('ID_FACULTAD');
            $table->integer('NRO')->unsigned();
            $table->string('NOMBRE', 256);
            $table->text('CONTENIDO');
            $table->string('LEY_ASOCIADA', 128);
            $table->string('ART_LEY_ASOCIADA', 128);
            $table->text('REFERENCIA_LEGAL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facultades');
    }
}