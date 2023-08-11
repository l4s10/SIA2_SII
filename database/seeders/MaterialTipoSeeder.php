<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        DB::table('tipo_material')->insert([
            ['ID_TIPO_MAT' => 1, 'TIPO_MATERIAL' => 'ASEO', 'ID_DIRECCION' => 16],
            ['ID_TIPO_MAT' => 2, 'TIPO_MATERIAL' => 'ESCRITORIO', 'ID_DIRECCION' => 16],
            ['ID_TIPO_MAT' => 3, 'TIPO_MATERIAL' => 'COMPUTACION', 'ID_DIRECCION' => 16],
            ['ID_TIPO_MAT' => 4, 'TIPO_MATERIAL' => 'ELECTRODOMESTICOS', 'ID_DIRECCION' => 16],

            ['ID_TIPO_MAT' => 5, 'TIPO_MATERIAL' => 'ASEO', 'ID_DIRECCION' => 18],
            ['ID_TIPO_MAT' => 6, 'TIPO_MATERIAL' => 'ESCRITORIO', 'ID_DIRECCION' => 18],
            ['ID_TIPO_MAT' => 7, 'TIPO_MATERIAL' => 'COMPUTACION', 'ID_DIRECCION' => 18],
            ['ID_TIPO_MAT' => 8, 'TIPO_MATERIAL' => 'ELECTRODOMESTICOS', 'ID_DIRECCION' => 18],

            ['ID_TIPO_MAT' => 9, 'TIPO_MATERIAL' => 'ASEO', 'ID_DIRECCION' => 10],
            ['ID_TIPO_MAT' => 10, 'TIPO_MATERIAL' => 'ESCRITORIO', 'ID_DIRECCION' => 10],
            ['ID_TIPO_MAT' => 11, 'TIPO_MATERIAL' => 'COMPUTACION', 'ID_DIRECCION' => 10],
            ['ID_TIPO_MAT' => 12, 'TIPO_MATERIAL' => 'ELECTRODOMESTICOS', 'ID_DIRECCION' => 10]
        ]);
    }
}
