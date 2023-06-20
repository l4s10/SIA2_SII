<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resolucion;

class ResolucionesSeeder extends Seeder
{
    public function run()
    {
        $resoluciones = [
            ['ID_RESOLUCION' => 1, 'NRO_RESOLUCION' => '1802', 'FECHA' => '2018-02-27', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 1, 'ID_DELEGADO' => 19],
            ['ID_RESOLUCION' => 2, 'NRO_RESOLUCION' => '1802', 'FECHA' => '2018-02-27', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 1, 'ID_DELEGADO' => 20],
            ['ID_RESOLUCION' => 3, 'NRO_RESOLUCION' => '1802', 'FECHA' => '2018-02-27', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 1, 'ID_DELEGADO' => 21],
            ['ID_RESOLUCION' => 4, 'NRO_RESOLUCION' => '1802', 'FECHA' => '2018-02-27', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 1, 'ID_DELEGADO' => 22],
            ['ID_RESOLUCION' => 5, 'NRO_RESOLUCION' => '1802', 'FECHA' => '2018-02-27', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 1, 'ID_DELEGADO' => 23],
            ['ID_RESOLUCION' => 6, 'NRO_RESOLUCION' => '1802', 'FECHA' => '2018-02-27', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 1, 'ID_DELEGADO' => 24],
            ['ID_RESOLUCION' => 7, 'NRO_RESOLUCION' => '1802', 'FECHA' => '2018-02-27', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 1, 'ID_DELEGADO' => 25],
            ['ID_RESOLUCION' => 8, 'NRO_RESOLUCION' => '1802', 'FECHA' => '2018-02-27', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 1, 'ID_DELEGADO' => 26],
            ['ID_RESOLUCION' => 9, 'NRO_RESOLUCION' => '1802', 'FECHA' => '2018-02-27', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 1, 'ID_DELEGADO' => 27],
            ['ID_RESOLUCION' => 10, 'NRO_RESOLUCION' => '1802', 'FECHA' => '2018-02-27', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 1, 'ID_DELEGADO' => 28],
            ['ID_RESOLUCION' => 11, 'NRO_RESOLUCION' => '1802', 'FECHA' => '2018-02-27', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 1, 'ID_DELEGADO' => 29],
            ['ID_RESOLUCION' => 12, 'NRO_RESOLUCION' => '1802', 'FECHA' => '2018-02-27', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 1, 'ID_DELEGADO' => 30],

            ['ID_RESOLUCION' => 13, 'NRO_RESOLUCION' => '6195', 'FECHA' => '2015-09-01', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 11, 'ID_DELEGADO' => 9],          
            ['ID_RESOLUCION' => 14, 'NRO_RESOLUCION' => '6195', 'FECHA' => '2015-09-01', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 11, 'ID_DELEGADO' => 31],          
            ['ID_RESOLUCION' => 15, 'NRO_RESOLUCION' => '6195', 'FECHA' => '2015-09-01', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 11, 'ID_DELEGADO' => 32],          
            ['ID_RESOLUCION' => 16, 'NRO_RESOLUCION' => '6195', 'FECHA' => '2015-09-01', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 11, 'ID_DELEGADO' => 8],          
            ['ID_RESOLUCION' => 17, 'NRO_RESOLUCION' => '6195', 'FECHA' => '2015-09-01', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 11, 'ID_DELEGADO' => 10], 

            ['ID_RESOLUCION' => 18, 'NRO_RESOLUCION' => '5', 'FECHA' => '2015-03-02', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 3, 'ID_DELEGADO' => 5],

            ['ID_RESOLUCION' => 19, 'NRO_RESOLUCION' => '1936', 'FECHA' => '2013-03-04', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 4, 'ID_DELEGADO' => 5],          
            ['ID_RESOLUCION' => 20, 'NRO_RESOLUCION' => '1936', 'FECHA' => '2013-03-04', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 4, 'ID_DELEGADO' => 9],          
            ['ID_RESOLUCION' => 21, 'NRO_RESOLUCION' => '1936', 'FECHA' => '2013-03-04', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 4, 'ID_DELEGADO' => 31],          
            ['ID_RESOLUCION' => 22, 'NRO_RESOLUCION' => '1936', 'FECHA' => '2013-03-04', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 4, 'ID_DELEGADO' => 32],          
            ['ID_RESOLUCION' => 23, 'NRO_RESOLUCION' => '1936', 'FECHA' => '2013-03-04', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 4, 'ID_DELEGADO' => 8],          
            ['ID_RESOLUCION' => 24, 'NRO_RESOLUCION' => '1936', 'FECHA' => '2013-03-04', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 4, 'ID_DELEGADO' => 10], 

            ['ID_RESOLUCION' => 25, 'NRO_RESOLUCION' => '2689', 'FECHA' => '2013-03-25', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 5, 'ID_DELEGADO' => 5],          
            ['ID_RESOLUCION' => 26, 'NRO_RESOLUCION' => '2689', 'FECHA' => '2013-03-25', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 5, 'ID_DELEGADO' => 9],          
            ['ID_RESOLUCION' => 27, 'NRO_RESOLUCION' => '2689', 'FECHA' => '2013-03-25', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 5, 'ID_DELEGADO' => 31],          
            ['ID_RESOLUCION' => 28, 'NRO_RESOLUCION' => '2689', 'FECHA' => '2013-03-25', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 5, 'ID_DELEGADO' => 32],          
            ['ID_RESOLUCION' => 29, 'NRO_RESOLUCION' => '2689', 'FECHA' => '2013-03-25', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 5, 'ID_DELEGADO' => 8],          
            ['ID_RESOLUCION' => 30, 'NRO_RESOLUCION' => '2689', 'FECHA' => '2013-03-25', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 5, 'ID_DELEGADO' => 10],
            
            ['ID_RESOLUCION' => 31, 'NRO_RESOLUCION' => '1574', 'FECHA' => '2012-02-16', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 6, 'ID_DELEGADO' => 6],

            ['ID_RESOLUCION' => 32, 'NRO_RESOLUCION' => '1575', 'FECHA' => '2012-02-17', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 7, 'ID_DELEGADO' => 6],

            ['ID_RESOLUCION' => 33, 'NRO_RESOLUCION' => '1802', 'FECHA' => '2012-02-18', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 8, 'ID_DELEGADO' => 6],

            ['ID_RESOLUCION' => 34, 'NRO_RESOLUCION' => '2197', 'FECHA' => '2012-03-09', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 9, 'ID_DELEGADO' => 5],          
            ['ID_RESOLUCION' => 35, 'NRO_RESOLUCION' => '2197', 'FECHA' => '2012-03-09', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 9, 'ID_DELEGADO' => 9],
            ['ID_RESOLUCION' => 36, 'NRO_RESOLUCION' => '2197', 'FECHA' => '2012-03-09', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 9, 'ID_DELEGADO' => 31],
            ['ID_RESOLUCION' => 37, 'NRO_RESOLUCION' => '2197', 'FECHA' => '2012-03-09', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 9, 'ID_DELEGADO' => 32],
            ['ID_RESOLUCION' => 38, 'NRO_RESOLUCION' => '2197', 'FECHA' => '2012-03-09', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 9, 'ID_DELEGADO' => 8],
            ['ID_RESOLUCION' => 39, 'NRO_RESOLUCION' => '2197', 'FECHA' => '2012-03-09', 'ID_TIPO' => 1, 'ID_FIRMANTE' => 1, 'ID_FACULTAD' => 9, 'ID_DELEGADO' => 10]
        ];
        
        //Población de la tabla 'resoluciones' con RESOLUCIONES DELEGATORIAS
        foreach ($resoluciones as $resolucion) {
            Resolucion::create($resolucion);
        }   
    }
}