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
            $table->id();//*como (ID_USUARIO)*/
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('rut');
            $table->string('depto');
            $table->rememberToken();
            $table->string('region')->nullable();
            $table->string('ubicacion')->nullable();
            $table->string('grupo')->nullable();
            $table->string('escalafon')->nullable();
            $table->string('grado')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_asim_planta')->nullable();
            $table->string('calidad_juridica')->nullable();
            $table->string('funcion')->nullable();
            $table->string('profesion')->nullable();
            $table->string('area')->nullable();
            $table->string('fono')->nullable();
            $table->string('anexo')->nullable();
            $table->string('sexo', 1)->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->foreignId('current_team_id')->nullable();
            // $table->string('profile_photo_path', 2048)->nullable();
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
