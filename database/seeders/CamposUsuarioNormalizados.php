<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//*Para insertar datos en mas de una tabla en un mismo seeder
/**
 * Importar MODELOS de las tablas que queremos poblar e insertar datos
 * para cada una de ellas.
**/
use App\Models\Departamento;
use App\Models\Region;
use App\Models\Ubicacion;
use App\Models\Grupo;
use App\Models\Escalafon;
use App\Models\Grado;
use App\Models\CalidadJuridica;
use App\Models\Sexo;

class CamposUsuarioNormalizados extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //* Insertamos datos en la tablas con el metodo INSERT
        // Población de la tabla 'departamento'
        Departamento::insert([
            ['ID_DEPART' => 1, 'DEPARTAMENTO' => 'DEPARTAMENTO DE FISCALIZACION'],
            ['ID_DEPART' => 2, 'DEPARTAMENTO' => 'DEPARTAMENTO ASISTENCIA AL CONTRIBUYENTE'],
            ['ID_DEPART' => 3, 'DEPARTAMENTO' => 'DEPARTAMENTO DE AVALUACIONES'],
            ['ID_DEPART' => 4, 'DEPARTAMENTO' => 'DEPARTAMENTO JURIDICO'],
        ]);
        // Población de la tabla 'region'
        Region::insert([
            ['ID_REGION' => 1, 'REGION' => 'Región de Arica y Parinacota'],
            ['ID_REGION' => 2, 'REGION' => 'Región de Tarapacá'],
            ['ID_REGION' => 3, 'REGION' => 'Región de Antofagasta'],
            ['ID_REGION' => 4, 'REGION' => 'Región de Atacama'],
            ['ID_REGION' => 5, 'REGION' => 'Región de Coquimbo'],
            ['ID_REGION' => 6, 'REGION' => 'Región de Valparaíso'],
            ['ID_REGION' => 7, 'REGION' => 'Región Metropolitana de Santiago'],
            ['ID_REGION' => 8, 'REGION' => "Región del Libertador General Bernardo O'Higgins"],
            ['ID_REGION' => 9, 'REGION' => 'Región del Maule'],
            ['ID_REGION' => 10, 'REGION' => 'Región de Ñuble'],
            ['ID_REGION' => 11, 'REGION' => 'Región del Biobío'],
            ['ID_REGION' => 12, 'REGION' => 'Región de La Araucanía'],
            ['ID_REGION' => 13, 'REGION' => 'Región de Los Ríos'],
            ['ID_REGION' => 14, 'REGION' => 'Región de Los Lagos'],
            ['ID_REGION' => 15, 'REGION' => "Región de Aysén del General Carlos Ibáñez del Campo"],
            ['ID_REGION' => 16, 'REGION' => "Región de Magallanes y de la Antártica Chilena"]

        ]);
        // Población de la tabla 'ubicacion'
        Ubicacion::insert([
            ['ID_UBICACION' => 1, 'UBICACION' => 'DEPARTAMENTO DE ADMINISTRACIÓN'],
            ['ID_UBICACION' => 2, 'UBICACION' => 'DEPARTAMENTO DE FISCALIZACIÓN'],
            ['ID_UBICACION' => 3, 'UBICACION' => 'DEPARTAMENTO DE AVALUACIONES'],
            ['ID_UBICACION' => 4, 'UBICACION' => 'DEPARTAMENTO DE ASISTENCIA AL CONTRIBUYENTE'],
            ['ID_UBICACION' => 5, 'UBICACION' => 'UNIDAD DE LOS ÁNGELES'],
            ['ID_UBICACION' => 6, 'UBICACION' => 'UNIDAD DE LEBU'],
            ['ID_UBICACION' => 8, 'UBICACION' => 'UNIDAD DE TALCAHUANO'],
            ['ID_UBICACION' => 9, 'UBICACION' => 'DEPARTAMENTO JURÍDICO'],
            ['ID_UBICACION' => 10, 'UBICACION' => 'DEPARTAMENTO DE PROCEDIMIENTOS ADMINISTRATIVOS TRIBUTARIOS'],
        ]);
        // Población de la tabla 'grupo'
        Grupo::insert([
            ['ID_GRUPO' => 1, 'GRUPO' => 'GRUPO N°1 FISCALIZACIÓN'],
            ['ID_GRUPO' => 2, 'GRUPO' => 'GRUPO N°2 FISCALIZACIÓN'],
            ['ID_GRUPO' => 3, 'GRUPO' => 'GRUPO N°3 FISCALIZACIÓN'],
            ['ID_GRUPO' => 4, 'GRUPO' => 'GRUPO N°4 FISCALIZACIÓN'],
            ['ID_GRUPO' => 5, 'GRUPO' => 'GRUPO N°5 FISCALIZACIÓN'],
            ['ID_GRUPO' => 6, 'GRUPO' => 'GRUPO N°6 FISCALIZACIÓN'],
            ['ID_GRUPO' => 7, 'GRUPO' => 'GRUPO N°7 FISCALIZACIÓN'],
            ['ID_GRUPO' => 8, 'GRUPO' => 'GRUPO N°1 AVALUACIONES'],
            ['ID_GRUPO' => 9, 'GRUPO' => 'GRUPO N°2 AVALUACIONES'],
            ['ID_GRUPO' => 10, 'GRUPO' => 'GRUPO N°1 ATENCIÓN DE CONTRIBUYENTES'],
            ['ID_GRUPO' => 11, 'GRUPO' => 'GRUPO N°2 ATENCIÓN DE CONTRIBUYENTES'],
            ['ID_GRUPO' => 12, 'GRUPO' => 'GRUPO N°1 INFORMACIÓN Y ASISTENCIA'],
            ['ID_GRUPO' => 13, 'GRUPO' => 'GRUPO N°1 ATENCIÓN Y ASISTENCIA'],
            ['ID_GRUPO' => 14, 'GRUPO' => 'GRUPO CUMPLIMIENTO TRIBUTARIO EN TERRENO'],
            ['ID_GRUPO' => 15, 'GRUPO' => 'GRUPO AVALUACIONES'],
        ]);
        // Población de la tabla 'escalafon'
        Escalafon::insert([
            ['ID_ESCALAFON' => 1, 'ESCALAFON' => 'TECNICO EN FISCALIZACION'],
            ['ID_ESCALAFON' => 2, 'ESCALAFON' => 'ADMINISTRATIVO'],
            ['ID_ESCALAFON' => 3, 'ESCALAFON' => 'FISCALIZADOR TRIBUTARIO'],
            ['ID_ESCALAFON' => 4, 'ESCALAFON' => 'PROFESIONAL'],
            ['ID_ESCALAFON' => 5, 'ESCALAFON' => 'DIRECTIVO'],
            ['ID_ESCALAFON' => 6, 'ESCALAFON' => 'AUXILIAR'],
            ['ID_ESCALAFON' => 7, 'ESCALAFON' => 'TECNICO EN INFORMATICA'],
            ['ID_ESCALAFON' => 8, 'ESCALAFON' => 'TECNICO EN AVALUACIONES'],
            ['ID_ESCALAFON' => 9, 'ESCALAFON' => 'FISCALIZADOR TRASADOR'],
        ]);
        // Población de la tabla 'grado'
        Grado::insert([
            ['ID_GRADO' => 1, 'GRADO' => 4],
            ['ID_GRADO' => 2, 'GRADO' => 7],
            ['ID_GRADO' => 3, 'GRADO' => 8],
            ['ID_GRADO' => 4, 'GRADO' => 9],
            ['ID_GRADO' => 5, 'GRADO' => 10],
            ['ID_GRADO' => 6, 'GRADO' => 11],
            ['ID_GRADO' => 7, 'GRADO' => 12],
            ['ID_GRADO' => 8, 'GRADO' => 13],
            ['ID_GRADO' => 9, 'GRADO' => 14],
            ['ID_GRADO' => 10, 'GRADO' => 15],
            ['ID_GRADO' => 11, 'GRADO' => 16],
            ['ID_GRADO' => 12, 'GRADO' => 17],
            ['ID_GRADO' => 13, 'GRADO' => 18],
            ['ID_GRADO' => 14, 'GRADO' => 19],
            ['ID_GRADO' => 15, 'GRADO' => 20],
            ['ID_GRADO' => 16, 'GRADO' => 21],
        ]);
        // Población de la tabla 'calidad_juridica'
        CalidadJuridica::insert([
            ['ID_CALIDAD' => 1, 'CALIDAD' => 'PLANTA'],
            ['ID_CALIDAD' => 2, 'CALIDAD' => 'CONTRATA'],
            ['ID_CALIDAD' => 3, 'CALIDAD' => 'OTROS'],
        ]);
        // Población de la tabla 'sexo'
        Sexo::insert([
            ['ID_SEXO' => 1, 'SEXO' => 'MASCULINO'],
            ['ID_SEXO' => 2, 'SEXO' => 'FEMENINO'],
        ]);
    }
}
