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
        Schema::create('solicitud_salas', function (Blueprint $table) {
            $table->integer('ID_SOL_SALA');
            $table->integer('ID_USUARIO')->nullable();
            $table->string('EQUIPO_SALA', 50)->nullable();
            $table->string('MOTIVO_SOL_SALA', 1000)->nullable();
            $table->integer('CANT_PERSONAS_SOL_SALAS')->nullable();
            $table->date('FECHA_SOL_SALA')->nullable();
            $table->string('HORA_INICIO_SOL_SALA', 128)->nullable();
            $table->string('HORA_TERM_SOL_SALA', 128)->nullable();
            $table->string('SALA_A_ASIGNAR', 128)->nullable();
            $table->string('ESTADO_SOL_SALA', 128)->nullable();
            $table->string('MODIFICADO_POR_SOL_SALA', 128)->nullable();
            $table->string('OBSERV_SOL_SALA', 1000)->nullable();
            $table->integer('ID_SALA')->references('ID_SALA')->on('salas');
            $table->integer('ID_TIPO_EQUIPOS')->references('ID_TIPO_EQUIPOS')->on('tipo_equipos');
            $table->timestamps();
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
        Schema::dropIfExists('solicitud_salas');
    }
};
