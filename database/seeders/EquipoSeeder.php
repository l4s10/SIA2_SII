<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipos')->insert([
            [
                'ID_EQUIPO' => 1,
                'MARCA_EQUIPO' => 'HP',
                'MODELO_EQUIPO' => 'HP',
                'ESTADO_EQUIPO' => 'DISPONIBLE',
                'ID_TIPO_EQUIPOS' => 1,
            ],
            [
                'ID_EQUIPO' => 2,
                'MARCA_EQUIPO' => 'LENOVO',
                'MODELO_EQUIPO' => 'T420',
                'ESTADO_EQUIPO' => 'DISPONIBLE',
                'ID_TIPO_EQUIPOS' => 1,
            ],
            [
                'ID_EQUIPO' => 3,
                'MARCA_EQUIPO' => 'SAMSUNG',
                'MODELO_EQUIPO' => 'S',
                'ESTADO_EQUIPO' => 'DISPONIBLE',
                'ID_TIPO_EQUIPOS' => 2,
            ],
        ]);
    }
}
