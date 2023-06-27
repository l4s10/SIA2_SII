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
        Schema::create('polizas', function (Blueprint $table) {
            $table->increments('ID_POLIZA');
            $table->unsignedBigInteger('ID');
            $table->string('FECHA_VENCIMIENTO_LICENCIA');
            $table->integer('NRO_POLIZA')->unsigned();
            // Agrega aquí los demás campos de la tabla 'polizas' si los tienes

            // Relación con la tabla 'funcionarios'
            $table->foreign('ID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polizas');
    }
};
