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
        Schema::create('rel_fun_veh', function (Blueprint $table) {
            $table->integer('ID_SOL_VEH')->primary();
            $table->string('PATENTE_VEHICULO', 7);
            //*Campos usuarios
            $table->string('NOMBRE_SOLICITANTE',128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            $table->integer('ID_USUARIO')->nullable()->references('id')->on('users');
            
            $table->string('MOTIVO_SOL_VEH', 1000)->nullable();
            $table->string('CONDUCTOR', 128)->nullable();
            $table->date('FECHA_SALIDA_SOL_VEH')->nullable();
            $table->date('FECHA_LLEGADA_SOL_VEH')->nullable();
            $table->string('HORA_SALIDA_SOL_VEH', 128)->nullable();
            $table->string('HORA_LLEGADA_SOL_VEH', 128)->nullable();
            $table->string('NOMBRE_OCUPANTES', 1000)->nullable();
            $table->date('FECHA_CREACION_SOL_VEH')->nullable();
            $table->string('ESTADO_SOL_VEH', 128)->nullable();
            $table->date('FECHA_MODIFICACION_SOL_VEH')->nullable();
            $table->string('MODIFICADO_POR_SOL_VEH', 128)->nullable();
            $table->string('OBSERV_SOL_VEH', 1000)->nullable();
            $table->integer('ID_TIPO_VEH')->nullable()->references('ID_TIPO_VEH')->on('tipo_vehiculo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rel_fun_veh');
    }
};
