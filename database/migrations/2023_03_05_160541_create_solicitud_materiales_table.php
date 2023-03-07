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
            //Importando campos de solicitud de materiales
            $table->id('ID_SOLICITUD');
            $table->string('NOMBRE_SOLICITANTE', 128);
            $table->string('RUT', 20);
            $table->string('DEPTO', 128);
            $table->string('EMAIL', 128);
            $table->string('TIPO_MAT_SOL',128);
            $table->text('MATERIAL_SOL');
            $table->string('ESTADO_SOL', 20)->default('pendiente');
            $table->timestamps();
            //Fechas de creacion y modificación
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
