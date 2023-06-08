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
        Schema::create('departamento', function (Blueprint $table) {
            $table->integer('ID_DEPART')->unsigned()->primary();
            $table->string('DEPARTAMENTO', 128)->nullable();
        });
        Schema::create('region', function (Blueprint $table) {
            $table->increments('ID_REGION');
            $table->string('REGION', 128)->nullable();
        });
        Schema::create('ubicacion', function (Blueprint $table) {
            $table->integer('ID_UBICACION')->unsigned()->primary();
            $table->string('UBICACION', 128)->nullable();
        });
        Schema::create('grupo', function (Blueprint $table) {
            $table->integer('ID_GRUPO')->unsigned()->primary();
            $table->string('GRUPO', 128)->nullable();
        });
        Schema::create('escalafon', function (Blueprint $table) {
            $table->integer('ID_ESCALAFON')->unsigned()->primary();
            $table->string('ESCALAFON', 128)->nullable();
        });
        Schema::create('grado', function (Blueprint $table) {
            $table->integer('ID_GRADO')->unsigned()->primary();
            $table->integer('GRADO')->nullable();
        });
        Schema::create('cargos', function(Blueprint $table){
            $table->integer('ID_CARGO')->unsigned()->primary();
            $table->string('CARGO', 128)->nullable();
        });
        Schema::create('calidad_juridica', function (Blueprint $table) {
            $table->integer('ID_CALIDAD')->unsigned()->primary();
            $table->string('CALIDAD', 128)->nullable();
        });
        Schema::create('sexo', function (Blueprint $table) {
            $table->integer('ID_SEXO')->unsigned()->primary();
            $table->string('SEXO', 128)->nullable();
        });

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

            $table->unsignedInteger('ID_CARGO');
            $table->foreign('ID_CARGO')->references('ID_CARGO')->on('cargos');

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
        Schema::dropIfExists('departamento');
        Schema::dropIfExists('region');
        Schema::dropIfExists('ubicacion');
        Schema::dropIfExists('grupo');
        Schema::dropIfExists('escalafon');
        Schema::dropIfExists('grado');
        Schema::dropIfExists('cargos');
        Schema::dropIfExists('calidad_juridica');
        Schema::dropIfExists('sexo');
    }
};
