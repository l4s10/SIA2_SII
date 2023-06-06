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
        Schema::create('rel_fun_salas', function (Blueprint $table) {
            $table->increments('ID_SOL_SALA');
            //*Campos basicos solicitud con la informacion del solicitante y quien edita*/
            $table->integer('ID_USUARIO')->unsigned()->references('id')->on('users');
            $table->string('NOMBRE_SOLICITANTE',128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            $table->string('EQUIPO_SALA', 128)->nullable();
            $table->string('MOTIVO_SOL_SALA', 1000)->nullable();
            $table->integer('CANT_PERSONAS_SOL_SALAS')->nullable();
            $table->string('FECHA_SOL_SALA',128)->nullable();
            $table->timestamp('FECHA_INICIO_ASIG_SALA')->nullable();
            $table->timestamp('FECHA_TERM_ASIG_SALA')->nullable();

            $table->string('HORA_SOL_SALA', 128)->nullable();
            $table->string('HORA_TERM_SOL_SALA', 128)->nullable();


            $table->string('SALA_PEDIDA', 128)->nullable();
            $table->string('SALA_A_ASIGNAR', 128)->nullable();
            $table->string('ESTADO_SOL_SALA', 128)->nullable();
            $table->string('MODIFICADO_POR_SOL_SALA', 128)->nullable();
            $table->string('OBSERV_SOL_SALA', 1000)->nullable();
            $table->integer('ID_CATEGORIA_SALA')->references('ID_CATEGORIA_SALA')->on('categoria_salas');
            $table->integer('ID_TIPO_EQUIPOS')->references('ID_TIPO_EQUIPOS')->on('tipo_equipos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rel_fun_salas');
    }
};
