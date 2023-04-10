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
        Schema::create('salas', function (Blueprint $table) {
            $table->increments('ID_SALA');
            $table->string('NOMBRE_SALA', 128)->nullable();
            $table->integer('CAPACIDAD_PERSONAS')->nullable();
            $table->string('ESTADO_SALA', 128)->nullable();
            $table->integer('ID_CATEGORIA_SALA')->references('ID_CATEGORIA_SALA')->on('categorias_salas');
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salas');
    }
};
