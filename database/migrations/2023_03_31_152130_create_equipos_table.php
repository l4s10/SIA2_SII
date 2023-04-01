<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('ID_EQUIPO');
            $table->string('MARCA_EQUIPO', 128)->nullable();
            $table->string('MODELO_EQUIPO', 128)->nullable();
            $table->string('ESTADO_EQUIPO', 128)->nullable();
            $table->unsignedInteger('ID_TIPO_EQUIPOS');
            $table->foreign('ID_TIPO_EQUIPOS')->references('ID_TIPO_EQUIPOS')->on('tipo_equipos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
