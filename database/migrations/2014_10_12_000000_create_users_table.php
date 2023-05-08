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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('NOMBRES', 255);
            $table->string('APELLIDOS', 255);
            $table->string('email', 255)->unique();
            $table->string('password')->nullable();
            $table->string('RUT', 20)->unique();
            $table->unsignedInteger('ID_DEPART');
            $table->foreign('ID_DEPART')->references('ID_DEPART')->on('departamento');
            $table->unsignedInteger('ID_REGION');
            $table->foreign('ID_REGION')->references('ID_REGION')->on('region');
            $table->unsignedInteger('ID_UBICACION');
            $table->foreign('ID_UBICACION')->references('ID_UBICACION')->on('ubicacion');
            $table->unsignedInteger('ID_GRUPO');
            $table->foreign('ID_GRUPO')->references('ID_GRUPO')->on('grupo');
            $table->unsignedInteger('ID_ESCALAFON');
            $table->foreign('ID_ESCALAFON')->references('ID_ESCALAFON')->on('escalafon');
            $table->unsignedInteger('ID_GRADO');
            $table->foreign('ID_GRADO')->references('ID_GRADO')->on('grado');
            $table->date('FECHA_NAC');
            $table->date('FECHA_INGRESO');
            $table->unsignedInteger('ID_CALIDAD_JURIDICA');
            $table->foreign('ID_CALIDAD_JURIDICA')->references('ID_CALIDAD')->on('calidad_juridica');
            $table->string('FONO', 255);
            $table->string('ANEXO', 255);
            $table->unsignedInteger('ID_SEXO');
            $table->foreign('ID_SEXO')->references('ID_SEXO')->on('sexo');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
