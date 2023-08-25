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
        Schema::create('rel_fun_rep_general', function (Blueprint $table) {
            $table->increments('ID_REP_INM');
            $table->integer('ID_USUARIO')->nullable();
            //------datos del solicitante (Eliminar?)------
            $table->string('NOMBRE_SOLICITANTE',128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            //---------------------------------
            // $table->string('TIPO_REPARCION_REP_GEN', 128)->nullable();
            //Podemos mostrar el tipo a traves de su id como en materiales
            $table->integer('ID_TIPO_REP_GENERAL')->references('ID_TIPO_REP_GENERAL')->on('tipo_reparacion');
            $table->string('REP_SOL', 1000);
            $table->string('MODIFICADO_POR_REP_GEN',128)->nullable();
            $table->string('ESTADO_REP_INM', 20)->default('INGRESADO');
            $table->string('OBSERV_REP_INM', 1000);
            //fecha creacion y modificacion con horas las posee timestamps (CREATED_AT y UPDATED_AT)
            //Como en el caso de materiales.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rel_fun_rep_general');
    }
};
