<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoVehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_vehiculo')->insert([
            [
                'ID_TIPO_VEH' => 1,
                'TIPO_VEHICULO' => 'AUTOMOVIL',
            ],
            [
                'ID_TIPO_VEH' => 2,
                'TIPO_VEHICULO' => 'SUV',
            ],
            [
                'ID_TIPO_VEH' => 3,
                'TIPO_VEHICULO' => 'CAMIONETA',
            ],
            [
                'ID_TIPO_VEH' => 4,
                'TIPO_VEHICULO' => 'FURGON',
            ],
        ]);
    }
}
