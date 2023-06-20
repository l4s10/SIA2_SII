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
        Schema::create('rel_fun_form', function (Blueprint $table) {
            //Agregamos los campos de la tabla en la BDD
            $table->increments('ID_SOL_FORM');
            $table->integer('ID_USUARIO')->unsigned()->references('id')->on('users');
            $table->string('NOMBRE_SOLICITANTE',128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            //--------FORMULARIO DE SOLICITUD
            $table->integer('ID_FORMULARIO')->nullable();
            $table->text('FORM_SOL')->nullable();
            $table->string('ESTADO_SOL_FORM')->default('INGRESADO');
            $table->text('OBSERV_SOL_FORM')->nullable();
            $table->string('MODIFICADO_POR_SOL_FORM',128)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rel_fun_form');
    }
};
