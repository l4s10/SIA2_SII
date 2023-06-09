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
        Schema::create('resoluciones', function (Blueprint $table) {
            $table->increments('ID_RESOLUCION');
            $table->integer('NRO_RESOLUCION')->unsigned();
            $table->dateTime('FECHA')->nullable();
            $table->integer('ID_CARGO')->unsigned();
            $table->string('FUNCIONARIOS_DELEGADOS', 128)->nullable();
            $table->string('MATERIA', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resoluciones');
    }
};
