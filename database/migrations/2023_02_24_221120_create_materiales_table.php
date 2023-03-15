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
        Schema::create('materiales', function (Blueprint $table) {
            $table->increments('ID_MATERIAL');
            $table->integer('ID_TIPO_MAT')->unsigned()->references('ID_TIPO_MAT')->on('tipo_material')->onDelete('cascade');
            $table->string('NOMBRE_MATERIAL', 128)->nullable();
            $table->integer('STOCK');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales');
    }
};
