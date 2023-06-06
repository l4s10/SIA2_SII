<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TipoEquiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_equipos')->insert([
            [
                'ID_TIPO_EQUIPOS' => 1,
                'TIPO_EQUIPO' => 'NOTEBOOK',
            ],
            [
                'ID_TIPO_EQUIPOS' => 2,
                'TIPO_EQUIPO' => 'DATA',
            ],
        ]);
    }
}

