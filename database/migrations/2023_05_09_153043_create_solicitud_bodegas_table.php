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
        Schema::create('rel_fun_bodegas', function (Blueprint $table) {
            $table->increments('ID_SOL_BODEGA');
            //*Campos basicos solicitud con la informacion del solicitante y quien edita*/
            $table->integer('ID_USUARIO')->unsigned()->references('id')->on('users');
            $table->string('NOMBRE_SOLICITANTE',128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            //*Aqui almacenamos el nombre de quien modifica el registro*/
            $table->string('MOTIVO_SOL_BODEGA', 1000)->nullable();
            $table->string('FECHA_SOL_BODEGA')->nullable();
            $table->string('HORA_INICIO_SOL_BODEGA', 128)->nullable();
            $table->string('HORA_TERM_SOL_BODEGA', 128)->nullable();

            $table->timestamp('FECHA_INICIO_ASIG_BODEGA')->nullable();
            $table->timestamp('FECHA_TERM_ASIG_BODEGA')->nullable();


            $table->string('BODEGA_PEDIDA', 128)->nullable();
            $table->string('ESTADO_SOL_BODEGA', 128)->nullable();
            $table->string('MODIFICADO_POR_SOL_BODEGA', 128)->nullable();
            $table->string('OBSERV_SOL_BODEGA', 1000)->nullable();
            //*referenciamos la categoria*/
            $table->integer('ID_CATEGORIA_SALA')->unsigned()->references('ID_CATEGORIA_SALA')->on('categoria_salas');
            //*Para fechas de creacion y modificacion de algun registro*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rel_fun_bodegas');
    }
};
