<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoReparacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_reparacion')->insert([
            [
                'ID_TIPO_REP_GENERAL' => 1,
                'TIPO_REP' => 'MOBILIARIO'
            ],
            [
                'ID_TIPO_REP_GENERAL' => 2,
                'TIPO_REP' => 'INFRAESTRUCTURA'
            ],
            [
                'ID_TIPO_REP_GENERAL' => 3,
                'TIPO_REP' => 'OTROS'
            ],
        ]);
    }
}
