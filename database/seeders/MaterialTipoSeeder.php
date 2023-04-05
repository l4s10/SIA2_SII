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
            ['ID_TIPO_MAT' => 1, 'TIPO_MATERIAL' => 'ASEO'],
            ['ID_TIPO_MAT' => 2, 'TIPO_MATERIAL' => 'ESCRITORIO'],
            ['ID_TIPO_MAT' => 3, 'TIPO_MATERIAL' => 'COMPUTACION'],
            ['ID_TIPO_MAT' => 4, 'TIPO_MATERIAL' => 'ELECTRODOMESTICOS']
        ]);
    }
}
