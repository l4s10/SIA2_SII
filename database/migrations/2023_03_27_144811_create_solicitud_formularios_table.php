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
        Schema::create('solicitud_formularios', function (Blueprint $table) {
            //Agregamos los campos de la tabla en la BDD
            $table->increments('ID_SOL_FORM');
            // $table->integer('ID_USUARIO')->nullable();
            //Agregamos los campos de todos los formularios
            $table->string('NOMBRE_SOLICITANTE',128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            //--------FORMULARIO DE SOLICITUD
            $table->integer('ID_FORMULARIO');
            $table->text('FORM_SOL')->nullable();
            $table->integer('CANT_FORM_SOL')->nullable();
            $table->string('ESTADO_SOL_FORM')->nullable();
            $table->text('OBSERV_SOL_FORM');
            $table->string('MODIFICADO_POR_SOL_FORM',128)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_formularios');
    }
};
