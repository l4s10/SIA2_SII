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
        Schema::create('solicitud_bodegas', function (Blueprint $table) {
            $table->id();
            //*Campos basicos solicitud con la informacion del solicituante y quien edita*/
            $table->string('NOMBRE_SOLICITANTE',128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            //*Aqui almacenamos el nombre de quien modifica el registro*/
            $table->string('REVISADO_POR',128);
            //*Para fechas de creacion y modificacion de algun registro*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_bodegas');
    }
};
