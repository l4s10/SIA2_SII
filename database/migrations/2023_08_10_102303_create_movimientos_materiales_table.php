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
        //  *Que debe tener la tabla de movimientos?*
        /*
            El material modificado (id_material)
            Motivo del cambio (Ingreso, Egreso/Despacho, Traslado, Merma)
            La cantidad a modificar (int) (cantidad nueva o cantidad a sumar o restar?) (discriminar en tipo de movimiento)
            La fecha del cambio (timestamp)

            Nombre de la persona (id_modificador)

        */
        Schema::create('rel_mat_mov', function (Blueprint $table) {
            $table->increments('ID_MOVIMIENTO');// ID del movimiento
            $table->unsignedBigInteger("ID_MATERIAL")->references('ID_MATERIAL')->on('materiales');//ID del material a modificar (referenciado directamente)
            $table->unsignedBigInteger('ID_MODIFICANTE')->references('id')->on('users'); //Quien modifica el registro
            $table->string("TIPO_MOVIMIENTO",10);///Motivo del cambio
            $table->integer('STOCK_PREVIO'); //Guarda el registro del stock antes de modificarlo
            $table->integer('STOCK_NUEVO'); //Guarda el nuevo stock -> SOBREESCRIBIR EN TABLA MATERIALES
            $table->timestamp('FECHA_PROGRAMADA')->nullable();
            $table->text('DETALLE_MOVIMIENTO', 1000)->default('SIN DESCRIPCION');
            $table->timestamps();// Fecha exacta de CREACION DEL REGISTRO
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rel_mat_mov');
    }
};
