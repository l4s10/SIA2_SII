<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInexistentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inexistentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ID_FORMULARIO');
            $table->string('RUT', 20)->nullable();
            $table->string('NOMBRE', 128)->nullable();
            $table->string('MATERIAL', 128)->nullable();
            $table->integer('CANTIDAD')->nullable();
            $table->string('MOTIVO', 1000)->nullable();
            $table->date('FECHA_PETICION')->nullable();
            $table->string('ESTADO', 128)->nullable();
            $table->string('OBSERVACIONES', 1000)->nullable();
            $table->unsignedBigInteger('ID_USUARIO'); // Cambio de tipo a unsignedBigInteger
            $table->foreign('ID_USUARIO')->references('id')->on('users'); // Agrega la referencia a la tabla users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inexistentes');
    }
}
