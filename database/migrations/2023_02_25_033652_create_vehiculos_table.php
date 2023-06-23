<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('ID_VEHICULO');
            $table->string('PATENTE_VEHICULO',7);
            $table->string('ID_TIPO_VEH', 128)->references('ID_TIPO_VEH')->on('tipo_vehiculo');
            $table->string('MARCA', 128)->nullable();
            $table->string('MODELO_VEHICULO', 128)->nullable();
            $table->string('ANO_VEHICULO', 128)->nullable();
            $table->string('UNIDAD_VEHICULO', 128)->references('ID_UBICACION')->on('ubicacion');
            $table->string('ESTADO_VEHICULO', 128)->nullable();
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
        Schema::dropIfExists('vehiculos');
    }
};
