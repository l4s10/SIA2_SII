<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('formularios')->insert([
            ['ID_FORMULARIO' => 1, 'NOMBRE_FORMULARIO' => 'F1816', 'TIPO_FORMULARIO' => 'TIPO B'],
            ['ID_FORMULARIO' => 2, 'NOMBRE_FORMULARIO' => 'F2121', 'TIPO_FORMULARIO' => 'TIPO B'],
            ['ID_FORMULARIO' => 3, 'NOMBRE_FORMULARIO' => 'F2816', 'TIPO_FORMULARIO' => 'TIPO B'],
            ['ID_FORMULARIO' => 4, 'NOMBRE_FORMULARIO' => 'F2890', 'TIPO_FORMULARIO' => 'TIPO B'],
            ['ID_FORMULARIO' => 5, 'NOMBRE_FORMULARIO' => 'F2899', 'TIPO_FORMULARIO' => 'TIPO B'],
            ['ID_FORMULARIO' => 6, 'NOMBRE_FORMULARIO' => 'F2900', 'TIPO_FORMULARIO' => 'TIPO B'],
            ['ID_FORMULARIO' => 7, 'NOMBRE_FORMULARIO' => 'F3230', 'TIPO_FORMULARIO' => 'TIPO B'],
            ['ID_FORMULARIO' => 8, 'NOMBRE_FORMULARIO' => 'F3239', 'TIPO_FORMULARIO' => 'TIPO B'],
            ['ID_FORMULARIO' => 9, 'NOMBRE_FORMULARIO' => 'F4415', 'TIPO_FORMULARIO' => 'TIPO B'],
            ['ID_FORMULARIO' => 10, 'NOMBRE_FORMULARIO' => 'F4416', 'TIPO_FORMULARIO' => 'TIPO B'],
            ['ID_FORMULARIO' => 11, 'NOMBRE_FORMULARIO' => 'F4417', 'TIPO_FORMULARIO' => 'TIPO B'],
            ['ID_FORMULARIO' => 12, 'NOMBRE_FORMULARIO' => 'F4418', 'TIPO_FORMULARIO' => 'TIPO B'],
            ['ID_FORMULARIO' => 13, 'NOMBRE_FORMULARIO' => 'F0024', 'TIPO_FORMULARIO' => 'TIPO B'],
            ['ID_FORMULARIO' => 14, 'NOMBRE_FORMULARIO' => 'FF0024,1', 'TIPO_FORMULARIO' => 'TIPO C'],
            [ 'ID_FORMULARIO' => 15, 'NOMBRE_FORMULARIO' => 'F1575', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 16, 'NOMBRE_FORMULARIO' => 'F2117', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 17, 'NOMBRE_FORMULARIO' => 'Q314', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 18, 'NOMBRE_FORMULARIO' => 'F2771', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 19, 'NOMBRE_FORMULARIO' => 'F2772', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 20, 'NOMBRE_FORMULARIO' => 'Q772.1', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 21, 'NOMBRE_FORMULARIO' => 'Q773', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 22, 'NOMBRE_FORMULARIO' => 'F2773', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 23, 'NOMBRE_FORMULARIO' => 'Q794', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 24, 'NOMBRE_FORMULARIO' => '22895', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 25, 'NOMBRE_FORMULARIO' => 'F3217', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 26, 'NOMBRE_FORMULARIO' => 'F3280', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 27, 'NOMBRE_FORMULARIO' => 'F3285', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 28, 'NOMBRE_FORMULARIO' => 'F3294', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 29, 'NOMBRE_FORMULARIO' => 'F3300', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 30, 'NOMBRE_FORMULARIO' => 'F3301', 'TIPO_FORMULARIO' => 'TIPO C' ],
            [ 'ID_FORMULARIO' => 31, 'NOMBRE_FORMULARIO' => 'F3302', 'TIPO_FORMULARIO' => 'TIPO C' ],
            ['ID_FORMULARIO' => 32, 'NOMBRE_FORMULARIO' => 'F3317', 'TIPO_FORMULARIO' => 'TIPO C'],
            ['ID_FORMULARIO' => 33, 'NOMBRE_FORMULARIO' => 'F4423', 'TIPO_FORMULARIO' => 'TIPO C'],
            ['ID_FORMULARIO' => 34, 'NOMBRE_FORMULARIO' => 'FNC37', 'TIPO_FORMULARIO' => 'TIPO C'],
            ['ID_FORMULARIO' => 35, 'NOMBRE_FORMULARIO' => 'FNC38', 'TIPO_FORMULARIO' => 'TIPO C'],
            ['ID_FORMULARIO' => 36, 'NOMBRE_FORMULARIO' => 'FNC47', 'TIPO_FORMULARIO' => 'TIPO C'],
            ['ID_FORMULARIO' => 37, 'NOMBRE_FORMULARIO' => 'FNC91', 'TIPO_FORMULARIO' => 'TIPO C'],
            ['ID_FORMULARIO' => 38, 'NOMBRE_FORMULARIO' => 'F3238', 'TIPO_FORMULARIO' => 'TIPO C']
        ]);
    }
}
