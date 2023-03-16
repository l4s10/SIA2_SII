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
        Schema::create('solicitud_materiales', function (Blueprint $table) {
            $table->id('ID_SOLICITUD');
            $table->string('NOMBRE_SOLICITANTE',128);
            $table->string('RUT', 20);
            //agregar refetrencias a tabla DEPARTAMENTOS
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            $table->text('MATERIAL_SOL');
            //agregar referencias a  tabla ESTADOS SOLCITUD
            $table->string('ESTADO_SOL', 20)->default('INGRESADO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_materiales');
    }
};
