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
        Schema::create('rel_fun_rep_veh', function (Blueprint $table) {
            $table->id('ID_SOL_REP_VEH');
            $table->integer('ID_USUARIO')->unsigned()->references('id')->on('users');
            //Campos informacion Solicitante
            $table->string('NOMBRE_SOLICITANTE',128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            //-------CAMPOS SOLICITUD---------//
            $table->string('PATENTE_VEHICULO', 7)->references('PATENTE_VEHICULO')->on('vehiculos');
            $table->integer('ID_TIPO_SERVICIO')->references('ID_TIPO_SERVICIO')->on('tipo_servicio');
            $table->text('DETALLE_REPARACION_REP_VEH')->nullable();
            $table->dateTime('FECHA_INICIO_REP_VEH')->nullable();
            $table->dateTime('FECHA_TERMINO_REP_VEH')->nullable();
            $table->string('ESTADO_SOL_REP_VEH', 128)->nullable()->default('INGRESADO');
            $table->string('MODIFICADO_POR_REP_VEH', 128)->nullable();
            $table->text('OBSERV_REP_VEH')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rel_fun_rep_veh');
    }
};
