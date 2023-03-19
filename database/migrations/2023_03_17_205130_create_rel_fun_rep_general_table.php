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
            $table->integer('ID_REP_INM')->unsigned()->primary();
            $table->integer('ID_USUARIO')->nullable();
            $table->string('TIPO_REPARCION_REP_GEN', 128)->nullable();
            $table->string('REP_SOL', 1000)->nullable();
            $table->string('ESTADO_REP_INM', 128)->nullable();
            $table->string('OBSERV_REP_INM', 1000)->nullable();
            $table->integer('ID_TIPO_REP_GENERAL')->unsigned()->references('ID_TIPO_REP_GENERAL')->on('tipo_reparacion');
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
