<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehiculo;

class VehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $vehiculos = [
        //     [
        //         'ID_VEHICULO' => 1,
        //         'PATENTE_VEHICULO' => 'FJSF-27',
        //         'ID_TIPO_VEH' => 3,
        //         'MARCA' => 'MAHINDRA',
        //         'MODELO_VEHICULO' => 'SCORPIO',
        //         'ANO_VEHICULO' => 2013,
        //         'UNIDAD_VEHICULO' => 'DEPARTAMENTO DE ADMINISTRACIÓN',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 2,
        //         'PATENTE_VEHICULO' => 'HSHV-15',
        //         'ID_TIPO_VEH' => 2,
        //         'MARCA' => 'TOYOTA',
        //         'MODELO_VEHICULO' => 'RAV 4',
        //         'ANO_VEHICULO' => 2016,
        //         'UNIDAD_VEHICULO' => 'UNIDAD DE LOS ÁNGELES',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 3,
        //         'PATENTE_VEHICULO' => 'JGZX-53',
        //         'ID_TIPO_VEH' => 2,
        //         'MARCA' => 'TOYOTA',
        //         'MODELO_VEHICULO' => 'RAV 4',
        //         'ANO_VEHICULO' => 2017,
        //         'UNIDAD_VEHICULO' => 'UNIDAD DE CHILLÁN',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 4,
        //         'PATENTE_VEHICULO' => 'HSHV-16',
        //         'ID_TIPO_VEH' => 2,
        //         'MARCA' => 'TOYOTA',
        //         'MODELO_VEHICULO' => 'RAV 4',
        //         'ANO_VEHICULO' => 2016,
        //         'UNIDAD_VEHICULO' => 'UNIDAD DE CHILLÁN',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 5,
        //         'PATENTE_VEHICULO' => 'CWVK-30',
        //         'ID_TIPO_VEH' => 2,
        //         'MARCA' => 'HYUNDAI',
        //         'MODELO_VEHICULO' => 'TUCSON',
        //         'ANO_VEHICULO' => 2011,
        //         'UNIDAD_VEHICULO' => 'UNIDAD DE LEBU',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 6,
        //         'PATENTE_VEHICULO' => 'GBTL-10',
        //         'ID_TIPO_VEH' => 3,
        //         'MARCA' => 'MAHINDRA',
        //         'MODELO_VEHICULO' => 'GENIO',
        //         'ANO_VEHICULO' => 2014,
        //         'UNIDAD_VEHICULO' => 'UNIDAD DE SAN CARLOS',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 7,
        //         'PATENTE_VEHICULO' => 'CWYD-87',
        //         'ID_TIPO_VEH' => 1,
        //         'MARCA' => 'HYUNDAI',
        //         'MODELO_VEHICULO' => 'ELANTRA',
        //         'ANO_VEHICULO' => 2011,
        //         'UNIDAD_VEHICULO' => 'UNIDAD DE TALCAHUANO',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 8,
        //         'PATENTE_VEHICULO' => 'GVDY-20',
        //         'ID_TIPO_VEH' => 3,
        //         'MARCA' => 'CHEVROLET',
        //         'MODELO_VEHICULO' => 'D-MAX',
        //         'ANO_VEHICULO' => 2015,
        //         'UNIDAD_VEHICULO' => 'DEPARTAMENTO DE ADMINISTRACIÓN',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 9,
        //         'PATENTE_VEHICULO' => 'LZFF-48',
        //         'ID_TIPO_VEH' => 2,
        //         'MARCA' => 'HYUNDAI',
        //         'MODELO_VEHICULO' => 'TUCSON',
        //         'ANO_VEHICULO' => 2020,
        //         'UNIDAD_VEHICULO' => 'DEPARTAMENTO DE ADMINISTRACIÓN',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 10,
        //         'PATENTE_VEHICULO' => 'FJGK-74',
        //         'ID_TIPO_VEH' => 5,
        //         'MARCA' => 'FIAT',
        //         'MODELO_VEHICULO' => 'DUCATO',
        //         'ANO_VEHICULO' => 2013,
        //         'UNIDAD_VEHICULO' => 'DEPARTAMENTO DE ADMINISTRACIÓN',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 11,
        //         'PATENTE_VEHICULO' => 'CWYF-10',
        //         'ID_TIPO_VEH' => 1,
        //         'MARCA' => 'HYUNDAI',
        //         'MODELO_VEHICULO' => 'ELANTRA',
        //         'ANO_VEHICULO' => 2011,
        //         'UNIDAD_VEHICULO' => 'UNIDAD DE LOS ÁNGELES',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 12,
        //         'PATENTE_VEHICULO' => 'HSHV-23',
        //         'ID_TIPO_VEH' => 2,
        //         'MARCA' => 'TOYOTA',
        //         'MODELO_VEHICULO' => 'RAV 4',
        //         'ANO_VEHICULO' => 2016,
        //         'UNIDAD_VEHICULO' => 'DEPARTAMENTO DE ADMINISTRACIÓN',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 13,
        //         'PATENTE_VEHICULO' => 'KDVD-24',
        //         'ID_TIPO_VEH' => 2,
        //         'MARCA' => 'TOYOTA',
        //         'MODELO_VEHICULO' => 'RAV 4',
        //         'ANO_VEHICULO' => 2018,
        //         'UNIDAD_VEHICULO' => 'DEPARTAMENTO DE ADMINISTRACIÓN',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 14,
        //         'PATENTE_VEHICULO' => 'KDVD-46',
        //         'ID_TIPO_VEH' => 2,
        //         'MARCA' => 'TOYOTA',
        //         'MODELO_VEHICULO' => 'RAV 4',
        //         'ANO_VEHICULO' => 2018,
        //         'UNIDAD_VEHICULO' => 'DEPARTAMENTO DE ADMINISTRACIÓN',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        //     [
        //         'ID_VEHICULO' => 15,
        //         'PATENTE_VEHICULO' => 'KDVD-44',
        //         'ID_TIPO_VEH' => 2,
        //         'MARCA' => 'TOYOTA',
        //         'MODELO_VEHICULO' => 'RAV 4',
        //         'ANO_VEHICULO' => 2018,
        //         'UNIDAD_VEHICULO' => 'DEPARTAMENTO DE ADMINISTRACIÓN',
        //         'ESTADO_VEHICULO' => 'DISPONIBLE'
        //     ],
        // ];

        // foreach ($vehiculos as $vehiculo) {
        //     Vehiculo::create($vehiculo);
        // }
    }
}
