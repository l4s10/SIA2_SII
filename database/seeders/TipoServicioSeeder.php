<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos_servicio = [
            [
                'ID_TIPO_SERVICIO' => 1,
                'TIPO_SERVICIO' => 'MANTENCION',
            ],
            [
                'ID_TIPO_SERVICIO' => 2,
                'TIPO_SERVICIO' => 'REPARACION',
            ],
        ];

        DB::table('tipo_servicio')->insert($tipos_servicio);
    }
}
