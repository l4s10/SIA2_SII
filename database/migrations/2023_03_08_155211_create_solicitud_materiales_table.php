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
        Schema::create('rel_fun_mat', function (Blueprint $table) {
            $table->id('ID_SOLICITUD');
            //*CAMPOS SOLICITANTE*/
            $table->integer('ID_USUARIO')->unsigned()->references('id')->on('users');
            $table->string('NOMBRE_SOLICITANTE',128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            $table->date('FECHA_ATENCION')->nullable(); //Fecha en la que se atiende la solicitud de alguien, cuando cambia de estado INGRESADO por primera vez.
            $table->date('FECHA_RECEPCION')->nullable(); //Fecha de confirmacion de la recepcion de productos.
            //*CAMPOS PARA SERVICIOS*/
            $table->date('FECHA_DESPACHO')->nullable(); // Fecha en la que el gestionador despacha los materiales solicitados.
            $table->text('MATERIAL_SOL');
            $table->string('OBSERVACIONES', 1000)->nullable();
            $table->string('ESTADO_SOL', 20)->default('INGRESADO');
            $table->string('MODIFICADO_POR')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rel_fun_mat');
    }
};
