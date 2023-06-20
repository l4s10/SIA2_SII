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
        Schema::create('rel_fun_equipos', function (Blueprint $table) {
            $table->increments('ID_SOL_EQUIPOS');
            //Campos informacion Solicitante
            $table->string('NOMBRE_SOLICITANTE',128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            //Campos relacionados con la solicitud
            $table->integer('ID_USUARIO')->references('id')->on('users')->nullable();
            $table->text('MOTIVO_SOL_EQUIPO', 1000)->nullable();
            $table->text('EQUIPO_SOL', 1000)->nullable();
            $table->string('FECHA_SOL_EQUIPO',128)->nullable();
            $table->string('HORA_INICIO_SOL_EQUIPO', 128)->nullable();
            $table->string('HORA_TERM_SOL_EQUIPO', 128)->nullable();
            //Fechas asignadas finales
            $table->timestamp('FECHA_INICIO_EQUIPO')->nullable();
            $table->timestamp('FECHA_FIN_EQUIPO')->nullable();
            $table->string('ESTADO_SOL_EQUIPO', 128)->default('INGRESADO');
            $table->text('EQUIPO_A_ASIGNAR', 1000)->nullable();
            $table->string('MODIFICADO_POR_SOL_EQUIPO', 128)->nullable();
            $table->text('OBSERV_SOL_EQUIPO', 1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rel_fun_equipos');
    }
};
