<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Material;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Material::create([
            'NOMBRE_MATERIAL' => 'Material 1',
            'TIPO_MATERIAL' => 'Tipo 1',
        ]);
        
        Material::create([
            'NOMBRE_MATERIAL' => 'Material 2',
            'TIPO_MATERIAL' => 'Tipo 2',
        ]);
    }
}
