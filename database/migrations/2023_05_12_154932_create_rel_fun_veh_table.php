<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelFunVehTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_fun_veh', function (Blueprint $table) {
            $table->increments('ID_SOL_VEH');
            $table->string('PATENTE_VEHICULO', 7)->nullable();
            $table->unsignedInteger('ID_USUARIO')->nullable();
            $table->string('NOMBRE_SOLICITANTE', 128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            $table->string('MOTIVO_SOL_VEH', 1000)->nullable();
            $table->string('CONDUCTOR', 128)->nullable();
            $table->string('OCUPANTE_1', 128)->nullable();
            $table->string('OCUPANTE_2', 128)->nullable();
            $table->string('OCUPANTE_3', 128)->nullable();
            $table->string('OCUPANTE_4', 128)->nullable();
            $table->string('OCUPANTE_5', 128)->nullable();
            $table->string('OCUPANTE_6', 128)->nullable();
            $table->string('ORIGEN', 128)->nullable();
            $table->string('DESTINO', 128)->nullable();
            $table->unsignedInteger('N_ORDEN_TRABAJO')->nullable();

            $table->string('FIRMA_CONDUCTOR', 128)->nullable();
            $table->string('FIRMA_JEFE_ADMINISTRACION', 128)->nullable();
            $table->string('FIRMA_ADMINISTRADOR', 128)->nullable();

            $table->string('KMS_INICIAL', 128)->nullable();
            $table->string('KMS_FINAL', 128)->nullable();
            $table->string('KMS_RECORRIDOS', 128)->nullable();
            $table->string('HORA_SALIDA',128)->nullable();
            $table->string('HORA_LLEGADA',128)->nullable();
            $table->string('HORAS_TOTALES', 128)->nullable();
            $table->string('NIVEL_TANQUE', 128)->nullable();
            $table->unsignedInteger('N_BITACORA')->nullable();
            $table->string('ABS_BENCINA', 128)->nullable();
            $table->string('FECHA_SOL_VEH', 128)->nullable();
            $table->timestamp('FECHA_SALIDA')->nullable();
            $table->timestamp('FECHA_LLEGADA')->nullable();
            $table->timestamp('FECHA_LLEGADA_CONDUCTOR')->nullable();
            $table->string('NOMBRE_OCUPANTES', 1000)->nullable();
            $table->string('ESTADO_SOL_VEH', 128)->default('INGRESADO');
            $table->string('MODIFICADO_POR_SOL_VEH', 128)->nullable();
            $table->string('OBSERV_SOL_VEH', 1000)->nullable();

            $table->integer('ID_TIPO_VEH')->unsigned()->references('ID_TIPO_VEH')->on('tipo_vehiculo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rel_fun_veh');
    }
}
