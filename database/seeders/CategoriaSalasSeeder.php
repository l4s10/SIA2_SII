<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSalasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoria_salas')->insert([
            ['ID_CATEGORIA_SALA' => 1, 'CATEGORIA_SALA' => 'SALAS'],
            ['ID_CATEGORIA_SALA' => 2, 'CATEGORIA_SALA' => 'BODEGAS'],
        ]);

        DB::table('salas')->insert([
            ['ID_SALA' => 1, 'NOMBRE_SALA' => 'CARMEN PROSSER', 'CAPACIDAD_PERSONAS' => 35, 'ESTADO_SALA' => 'DISPONIBLE', 'ID_CATEGORIA_SALA' => 1],
            ['ID_SALA' => 2, 'NOMBRE_SALA' => 'VIDEO CONFERENCIA', 'CAPACIDAD_PERSONAS' => 25, 'ESTADO_SALA' => 'DISPONIBLE', 'ID_CATEGORIA_SALA' => 1],
            ['ID_SALA' => 4, 'NOMBRE_SALA' => 'SALA REUNION DR', 'CAPACIDAD_PERSONAS' => 7, 'ESTADO_SALA' => 'DISPONIBLE', 'ID_CATEGORIA_SALA' => 1],
            ['ID_SALA' => 5, 'NOMBRE_SALA' => 'HALL RENTA', 'CAPACIDAD_PERSONAS' => 35, 'ESTADO_SALA' => 'DISPONIBLE', 'ID_CATEGORIA_SALA' => 1],
            ['ID_SALA' => 6, 'NOMBRE_SALA' => 'SALA 1', 'CAPACIDAD_PERSONAS' => 2, 'ESTADO_SALA' => 'DISPONIBLE', 'ID_CATEGORIA_SALA' => 1],
            ['ID_SALA' => 7, 'NOMBRE_SALA' => 'SALA 2', 'CAPACIDAD_PERSONAS' => 3, 'ESTADO_SALA' => 'DISPONOBLE', 'ID_CATEGORIA_SALA' => 1],
            ['ID_SALA' => 8, 'NOMBRE_SALA' => 'EXTERNA', 'CAPACIDAD_PERSONAS' => 30, 'ESTADO_SALA' => 'DISPONIBLE', 'ID_CATEGORIA_SALA' => 1],
            ['ID_SALA' => 9, 'NOMBRE_SALA' => 'OFICINA ADMINISTRACION - FRENTE SALA 2 2', 'CAPACIDAD_PERSONAS' => 4, 'ESTADO_SALA' => 'DISPONOBLE', 'ID_CATEGORIA_SALA' => 1],
            ['ID_SALA' => 10, 'NOMBRE_SALA' => 'OFICINA ASISTENTE SOCIAL', 'CAPACIDAD_PERSONAS' => 2, 'ESTADO_SALA' => 'DISPONIBLE', 'ID_CATEGORIA_SALA' => 1],
            ['ID_SALA' => 11, 'NOMBRE_SALA' => 'BODEGA HERAS', 'CAPACIDAD_PERSONAS' => 1, 'ESTADO_SALA' => 'DISPONIBLE', 'ID_CATEGORIA_SALA' => 2],
            ['ID_SALA' => 12, 'NOMBRE_SALA' => 'BODEGA BARRIO NORTE', 'CAPACIDAD_PERSONAS' => 1, 'ESTADO_SALA' => 'DISPONIBLE', 'ID_CATEGORIA_SALA' => 2],
            ['ID_SALA' => 13, 'NOMBRE_SALA' => 'BODEGA LOCAL', 'CAPACIDAD_PERSONAS' => 1, 'ESTADO_SALA' => 'DISPONIBLE', 'ID_CATEGORIA_SALA' => 2],
        ]);
    }
}
