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
        Schema::create('solicitud_equipos', function (Blueprint $table) {
            $table->increments('ID_SOL_EQUIPOS');
            //Campos informacion Solicitante
            $table->string('NOMBRE_SOLICITANTE',128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            //Campos relacionados con la solicitud
            $table->unsignedBigInteger('ID_USUARIO')->nullable();
            $table->string('TIPO_EQUIPO', 128)->nullable();
            $table->text('MOTIVO_SOL_EQUIPO')->nullable();
            $table->date('FECHA_SOL_EQUIPO')->nullable();
            $table->string('HORA_INICIO_SOL_EQUIPO', 128)->nullable();
            $table->string('HORA_TERM_SOL_EQUIPO', 128)->nullable();
            $table->string('ESTADO_SOL_EQUIPO', 128)->nullable();
            $table->string('EQUIPO_A_ASIGNAR', 128)->nullable();
            $table->string('MODIFICADO_POR_SOL_EQUIPO', 128)->nullable();
            $table->text('OBSERV_SOL_EQUIPO')->nullable();
            //Clave foránea
            $table->integer('ID_TIPO_EQUIPOS')->references('ID_TIPO_EQUIPOS')->on('tipo_equipos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_equipos');
    }
};
