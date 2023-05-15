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

            $table->integer('ID_USUARIO')->nullable()->unsigned()->references('id')->on('users');
            $table->string('NOMBRE_SOLICITANTE',128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);

            $table->string('MOTIVO_SOL_VEH', 1000)->nullable();
            $table->string('CONDUCTOR', 128)->nullable();
            $table->string('FECHA_SALIDA_SOL_VEH')->nullable();
            $table->string('FECHA_LLEGADA_SOL_VEH')->nullable();
            $table->string('HORA_SALIDA_SOL_VEH', 128)->nullable();
            $table->string('HORA_LLEGADA_SOL_VEH', 128)->nullable();
            $table->string('NOMBRE_OCUPANTES', 1000)->nullable();
            $table->string('ESTADO_SOL_VEH', 128)->nullable()->default('INGRESADO');
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
