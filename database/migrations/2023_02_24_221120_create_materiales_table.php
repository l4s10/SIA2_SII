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
        //*Crear tabla tipo materiales*/
        Schema::create('tipo_material', function (Blueprint $table) {
            $table->increments('ID_TIPO_MAT');
            $table->string('TIPO_MATERIAL',128);
            //* CAMPO NUEVO PARA QUE SE RELACIONE CON DIRECCION REGIONAL */
            $table->integer('ID_DIRECCION')->unsigned()->references('ID_DIRECCION')->on('direcciones_regionales');
            $table->timestamps();
        });
        //* Crear tabla de materiales*/
        Schema::create('materiales', function (Blueprint $table) {
            $table->increments('ID_MATERIAL');
            $table->integer('ID_TIPO_MAT')->unsigned()->references('ID_TIPO_MAT')->on('tipo_material')->onDelete('cascade');
            //* CAMPO NUEVO PARA QUE SE RELACIONE CON DIRECCION REGIONAL */
            $table->integer('ID_DIRECCION')->unsigned()->references('ID_DIRECCION')->on('direcciones_regionales');
            $table->string('NOMBRE_MATERIAL', 128)->nullable();
            $table->integer('STOCK')->unsigned();//Para que no tome valores negativos el stock
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales');
        Schema::dropIfExists('tipo_material');
    }
};
