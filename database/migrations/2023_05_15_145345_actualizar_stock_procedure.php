<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $procedure = "
            CREATE PROCEDURE actualizar_stock (IN producto_id INT, IN cantidad INT)
            BEGIN
                UPDATE materiales SET STOCK = STOCK - cantidad WHERE ID_MATERIAL = producto_id;
            END
        ";

        DB::unprepared($procedure);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $procedure = "DROP PROCEDURE IF EXISTS actualizar_stock";
        DB::unprepared($procedure);
    }
};
