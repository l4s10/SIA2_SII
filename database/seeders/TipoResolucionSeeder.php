<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoResolucion;

class TipoResolucionSeeder extends Seeder
{
    public function run()
    {
        $tipos = [
            ['ID_TIPO' => 1, 'NOMBRE' => 'DELEGATORIA'],
            ['ID_TIPO' => 2, 'NOMBRE' => 'NOMBRAMIENTO'],
            ['ID_TIPO' => 3, 'NOMBRE' => 'AUTORIZACIÓN DE DELEGACIÓN']

        ];
        
        //Población de la tabla 'resoluciones' con RESOLUCIONES DELEGATORIAS
        foreach ($tipos as $tipo) {
            TipoResolucion::create($tipo);
        }   
    }
}