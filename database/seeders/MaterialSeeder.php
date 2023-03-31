<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Material;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materiales')->insert([
            [
                'ID_MATERIAL' => 1,
                'ID_TIPO_MAT' => 1,
                'NOMBRE_MATERIAL' => 'ESCOBA',
                'STOCK' => 20
            ],
            [
                'ID_MATERIAL' => 2,
                'ID_TIPO_MAT' => 1,
                'NOMBRE_MATERIAL' => 'CLORO',
                'STOCK' => 50
            ],
            [
                'ID_MATERIAL' => 3,
                'ID_TIPO_MAT' => 2,
                'NOMBRE_MATERIAL' => 'LAPIZ PASTA ROJO',
                'STOCK' => 93
            ],
            [
                'ID_MATERIAL' => 4,
                'ID_TIPO_MAT' => 2,
                'NOMBRE_MATERIAL' => 'LAPIZ PASTA AZUL',
                'STOCK' => 95
            ],
            [
                'ID_MATERIAL' => 5,
                'ID_TIPO_MAT' => 1,
                'NOMBRE_MATERIAL' => 'BOLSAS DE BASURA',
                'STOCK' => 85
            ],
            [
                'ID_MATERIAL' => 6,
                'ID_TIPO_MAT' => 2,
                'NOMBRE_MATERIAL' => 'LAPIZ CORRECTOR',
                'STOCK' => 63
            ],
            [
                'ID_MATERIAL' => 7,
                'ID_TIPO_MAT' => 3,
                'NOMBRE_MATERIAL' => 'MOUSE INALAMBRICO',
                'STOCK' => 6
            ],
            [
                'ID_MATERIAL' => 8,
                'ID_TIPO_MAT' => 3,
                'NOMBRE_MATERIAL' => 'TECLADO INALAMBRICO',
                'STOCK' => 10
            ],
            [
                'ID_MATERIAL' => 9,
                'ID_TIPO_MAT' => 3,
                'NOMBRE_MATERIAL' => 'AURICULARES',
                'STOCK' => 12
            ],
            [
                'ID_MATERIAL' => 10,
                'ID_TIPO_MAT' => 4,
                'NOMBRE_MATERIAL' => 'TELEVISION',
                'STOCK' => 2
            ],
            [
                'ID_MATERIAL' => 11,
                'ID_TIPO_MAT' => 4,
                'NOMBRE_MATERIAL' => 'MICRONDAS',
                'STOCK' => 2
            ],
            [
                'ID_MATERIAL' => 12,
                'ID_TIPO_MAT' => 4,
                'NOMBRE_MATERIAL' => 'HORNO ELECTRICO',
                'STOCK' => 2
            ]
        ]);
    }
}
