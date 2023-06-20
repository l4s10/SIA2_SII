<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//*Para insertar datos en mas de una tabla en un mismo seeder
/**
 * Importar MODELOS de las tablas que queremos poblar e insertar datos
 * para cada una de ellas.
**/
// use App\Models\Departamento;
use App\Models\Region;
use App\Models\Ubicacion;
use App\Models\Grupo;
use App\Models\Escalafon;
use App\Models\Grado;
use App\Models\CalidadJuridica;
use App\Models\Sexo;
use App\Models\Comuna;
use App\Models\DireccionRegional;
use App\Models\Resolucion;
use App\Models\Cargo;

class CamposUsuarioNormalizados extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //* Insertamos datos en la tablas con el metodo INSERT
        // Población de la tabla 'departamento'
        // Departamento::insert([
        //     ['ID_DEPART' => 1, 'DEPARTAMENTO' => 'DEPARTAMENTO DE FISCALIZACION'],
        //     ['ID_DEPART' => 2, 'DEPARTAMENTO' => 'DEPARTAMENTO ASISTENCIA AL CONTRIBUYENTE'],
        //     ['ID_DEPART' => 3, 'DEPARTAMENTO' => 'DEPARTAMENTO DE AVALUACIONES'],
        //     ['ID_DEPART' => 4, 'DEPARTAMENTO' => 'DEPARTAMENTO JURIDICO'],
        // ]);
        // Población de la tabla 'region'
        Region::insert([
            ['ID_REGION' => 1, 'REGION' => 'REGIÓN DE ARICA Y PARINACOTA'],
            ['ID_REGION' => 2, 'REGION' => 'REGIÓN DE TARAPACÁ'],
            ['ID_REGION' => 3, 'REGION' => 'REGIÓN DE ANTOFAGASTA'],
            ['ID_REGION' => 4, 'REGION' => 'REGIÓN DE ATACAMA'],
            ['ID_REGION' => 5, 'REGION' => 'REGIÓN DE COQUIMBO'],
            ['ID_REGION' => 6, 'REGION' => 'REGIÓN DE VALPARAÍSO'],
            ['ID_REGION' => 7, 'REGION' => 'REGIÓN METROPOLITANA DE SANTIAGO'],
            ['ID_REGION' => 8, 'REGION' => 'REGIÓN DEL LIBERTADOR GENERAL BERNARDO O`HIGGINS'],
            ['ID_REGION' => 9, 'REGION' => 'REGIÓN DEL MAULE'],
            ['ID_REGION' => 10, 'REGION' => 'REGIÓN DE ÑUBLE'],
            ['ID_REGION' => 11, 'REGION' => 'REGIÓN DEL BIOBÍO'],
            ['ID_REGION' => 12, 'REGION' => 'REGIÓN DE LA ARAUCANÍA'],
            ['ID_REGION' => 13, 'REGION' => 'REGIÓN DE LOS RÍOS'],
            ['ID_REGION' => 14, 'REGION' => 'REGIÓN DE LOS LAGOS'],
            ['ID_REGION' => 15, 'REGION' => 'REGIÓN DE AYSÉN DEL GENERAL CARLOS IBÁÑEZ DEL CAMPO'],
            ['ID_REGION' => 16, 'REGION' => 'REGIÓN DE MAGALLANES Y DE LA ANTÁRTICA CHILENA'],
        ]);
        //Población de la tabla 'direcciones_regionales'
        DireccionRegional::insert([
            ['ID_DIRECCION' => 1, 'DIRECCION' => 'DIRECCION REGIONAL DE ARICA'],
            ['ID_DIRECCION' => 2, 'DIRECCION' => 'OFICINA ALTO HOSPICIO'],
            ['ID_DIRECCION' => 3, 'DIRECCION' => 'DIRECCION REGIONAL DE IQUIQUE'],
            /*['ID_DIRECCION' => 4, 'DIRECCION' => 'DIRECCION REGIONAL DE ANTOFAGASTA'],
            ['ID_DIRECCION' => 5, 'DIRECCION' => 'UNIDAD DE CALAMA'],
            ['ID_DIRECCION' => 6, 'DIRECCION' => 'UNIDAD DE TOCOPILLA'],
            ['ID_DIRECCION' => 7, 'DIRECCION' => 'UNIDAD DE TAL-TAL'],
            ['ID_DIRECCION' => 8, 'DIRECCION' => 'UNIDAD DE VALLENAR'],
            ['ID_DIRECCION' => 9, 'DIRECCION' => 'DIRECCION REGIONAL DE COPIAPO'],
            ['ID_DIRECCION' => 10, 'DIRECCION' => 'UNIDAD DE CHAÑARAL'],
            ['ID_DIRECCION' => 11, 'DIRECCION' => 'UNIDAD REGIONAL DE LA SERENA'],
            ['ID_DIRECCION' => 12, 'DIRECCION' => 'UNIDAD DE ILLAPEL'],
            ['ID_DIRECCION' => 13, 'DIRECCION' => 'UNIDAD DE OVALLE'],
            ['ID_DIRECCION' => 14, 'DIRECCION' => 'UNIDAD DE COQUIMBO'],
            ['ID_DIRECCION' => 15, 'DIRECCION' => 'UNIDAD DE SAN ANTONIO'],
            ['ID_DIRECCION' => 16, 'DIRECCION' => 'UNIDAD DE LA LIGUA'],
            ['ID_DIRECCION' => 17, 'DIRECCION' => 'UNIDAD DE LOS ANDES'],
            ['ID_DIRECCION' => 18, 'DIRECCION' => 'UNIDAD DE SAN ANTONIO'],
            ['ID_DIRECCION' => 19, 'DIRECCION' => 'DIRECCION REGIONAL DE VALPARAISO'],
            ['ID_DIRECCION' => 20, 'DIRECCION' => 'UNIDAD DE SAN FELIPE'],
            ['ID_DIRECCION' => 21, 'DIRECCION' => 'UNIDAD DE VIÑA DEL MAR'],
            ['ID_DIRECCION' => 22, 'DIRECCION' => 'UNIDAD DE QUILLOTA'],
            ['ID_DIRECCION' => 23, 'DIRECCION' => 'VILLA ALEMANA'],
            ['ID_DIRECCION' => 24, 'DIRECCION' => 'UNIDAD DE MELIPILLA'],
            ['ID_DIRECCION' => 25, 'DIRECCION' => 'UNIDAD DE BUIN'],
            ['ID_DIRECCION' => 26, 'DIRECCION' => 'UNIDAD DE SAN BERNARDO'],
            ['ID_DIRECCION' => 27, 'DIRECCION' => 'UNIDAD DE MAIPU'],
            ['ID_DIRECCION' => 28, 'DIRECCION' => 'DIRECCION REGIONAL SANTIAGO PONIENTE'],
            ['ID_DIRECCION' => 29, 'DIRECCION' => 'DIRECCION REGIONAL SANTIAGO NORTE'],
            ['ID_DIRECCION' => 30, 'DIRECCION' => 'DIRECCION REGIONAL SANTIAGO SUR'],
            ['ID_DIRECCION' => 31, 'DIRECCION' => 'UNIDAD DE LA FLORIDA'],
            ['ID_DIRECCION' => 32, 'DIRECCION' => 'UNIDAD DE ÑUÑOA'],
            ['ID_DIRECCION' => 33, 'DIRECCION' => 'DIRECCION REGIONAL SANTIAGO ORIENTE'],
            ['ID_DIRECCION' => 34, 'DIRECCION' => 'UNIDAD DE SAN FERNANDO'],
            ['ID_DIRECCION' => 35, 'DIRECCION' => 'UNIDAD DE SANTA CRUZ'],
            ['ID_DIRECCION' => 36, 'DIRECCION' => 'DIRECCION REGIONAL RANCAGUA'],
            ['ID_DIRECCION' => 37, 'DIRECCION' => 'UNIDAD DE PICHILEMU'],
            ['ID_DIRECCION' => 38, 'DIRECCION' => 'UNIDAD DE SAN VICENTE DE TAGUA TAGUA'],
            ['ID_DIRECCION' => 39, 'DIRECCION' => 'UNIDAD DE CAUQUENES'],
            ['ID_DIRECCION' => 40, 'DIRECCION' => 'UNIDAD DE LINARES'],
            ['ID_DIRECCION' => 50, 'DIRECCION' => 'UNIDAD DE CONSTITUCION'],
            ['ID_DIRECCION' => 51, 'DIRECCION' => 'DIRECCION REGIONAL DE TALCA'],
            ['ID_DIRECCION' => 52, 'DIRECCION' => 'UNIDAD DE CURICO'],
            ['ID_DIRECCION' => 53, 'DIRECCION' => 'UNIDAD DE PARRAL'],
            ['ID_DIRECCION' => 54, 'DIRECCION' => 'DIRECCION REGIONAL DE CHILLAN'],
            ['ID_DIRECCION' => 55, 'DIRECCION' => 'UNIDAD DE SAN CARLOS'],
            ['ID_DIRECCION' => 56, 'DIRECCION' => 'UNIDAD DE LOS ANGELES'],
            ['ID_DIRECCION' => 57, 'DIRECCION' => 'DIRECCION REGIONAL CONCEPCION'],
            ['ID_DIRECCION' => 58, 'DIRECCION' => 'LOCALIDAD DE CAÑETE'],
            ['ID_DIRECCION' => 59, 'DIRECCION' => 'UNIDAD DE LEBU'],
            ['ID_DIRECCION' => 60, 'DIRECCION' => 'UNIDAD DE TALCAHUANO'],
            ['ID_DIRECCION' => 61, 'DIRECCION' => 'UNIDAD DE ANGOL'],
            ['ID_DIRECCION' => 62, 'DIRECCION' => 'DIRECCION REGIONAL DE TEMUCO'],
            ['ID_DIRECCION' => 63, 'DIRECCION' => 'UNIDAD DE VICTORIA'],
            ['ID_DIRECCION' => 64, 'DIRECCION' => 'UNIDAD DE VILLARRICA'],
            ['ID_DIRECCION' => 65, 'DIRECCION' => 'DIRECCION REGIONAL VALDIVIA'],
            ['ID_DIRECCION' => 66, 'DIRECCION' => 'UNIDAD DE LA UNION'],
            ['ID_DIRECCION' => 67, 'DIRECCION' => 'UNIDAD DE LANCO'],
            ['ID_DIRECCION' => 68, 'DIRECCION' => 'UNIDAD DE PANGUIPULLI'],
            ['ID_DIRECCION' => 69, 'DIRECCION' => 'UNIDAD ANCUD'],
            ['ID_DIRECCION' => 70, 'DIRECCION' => 'UNIDAD PUERTO MONTT'],
            ['ID_DIRECCION' => 71, 'DIRECCION' => 'UNIDAD CASTRO'],
            ['ID_DIRECCION' => 72, 'DIRECCION' => 'OFICINA DE CHAITEN'],
            ['ID_DIRECCION' => 73, 'DIRECCION' => 'UNIDAD DE PUERTO VARAS'],
            ['ID_DIRECCION' => 74, 'DIRECCION' => 'UNIDAD DE OSORNO'],
            ['ID_DIRECCION' => 75, 'DIRECCION' => 'UNIDAD DE AYSEN'],
            ['ID_DIRECCION' => 76, 'DIRECCION' => 'UNIDAD DE CHILE CHICO'],
            ['ID_DIRECCION' => 77, 'DIRECCION' => 'OFICINA DE COCHRANE'],
            ['ID_DIRECCION' => 78, 'DIRECCION' => 'DIRECCION REGIONAL COYHAIQUE'],
            ['ID_DIRECCION' => 79, 'DIRECCION' => 'DIRECCION REGIONAL PUNTA ARENAS'],
            ['ID_DIRECCION' => 80, 'DIRECCION' => 'UNIDAD DE PORVENIR'],
            ['ID_DIRECCION' => 81, 'DIRECCION' => 'UNIDAD DE PUERTO NATALES']*/
        ]);
        // Población de la tabla 'ubicacion'
        Ubicacion::insert([
            ['ID_UBICACION' => 1, 'UBICACION' => 'GABINETE DIRECTOR'],
            ['ID_UBICACION' => 2, 'UBICACION' => 'DEPARTAMENTO DE ADMINISTRACIÓN'],
            ['ID_UBICACION' => 3, 'UBICACION' => 'DEPARTAMENTO DE FISCALIZACIÓN'],
            ['ID_UBICACION' => 4, 'UBICACION' => 'DEPARTAMENTO DE ASISTENCIA AL CONTRIBUYENTE'],
            ['ID_UBICACION' => 5, 'UBICACION' => 'DEPARTAMENTO DE AVALUACIONES'],
            ['ID_UBICACION' => 6, 'UBICACION' => 'UNIDAD DE LOS ÁNGELES'],
            ['ID_UBICACION' => 7, 'UBICACION' => 'UNIDAD DE LEBU'],
            ['ID_UBICACION' => 8, 'UBICACION' => 'UNIDAD DE TALCAHUANO'],
            ['ID_UBICACION' => 9, 'UBICACION' => 'DEPARTAMENTO DE PROCEDIMIENTOS ADMINISTRATIVOS TRIBUTARIOS'],
            ['ID_UBICACION' => 10, 'UBICACION' => 'DEPARTAMENTO JURÍDICO'],
            ['ID_UBICACION' => 99, 'UBICACION' => 'DIRECCION NACIONAL'],
            ['ID_UBICACION' => 999, 'UBICACION' => 'EXTERNO'],

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
        Cargo::insert([
            ['ID_CARGO' => 1, 'CARGO' => 'DIRECTOR REGIONAL'],
            ['ID_CARGO' => 2, 'CARGO' => 'JEFE DE DEPARTAMENTO JURIDICO'],
            ['ID_CARGO' => 3, 'CARGO' => 'JEFE DE DEPARTAMENTO DE FISCALIZACION'],
            ['ID_CARGO' => 4, 'CARGO' => 'JEFE DE DEPARTAMENTO DE ASISTENCIA'],
            ['ID_CARGO' => 5, 'CARGO' => 'JEFE DE DEPARTAMENTO DE AVALUACIONES'],
            ['ID_CARGO' => 6, 'CARGO' => 'JEFE DE DEPARTAMENTO DE PROCEDIMIENTOS ADMINISTRATIVOS'],
            ['ID_CARGO' => 7, 'CARGO' => 'JEFE DE ADMINISTRACION'],
            ['ID_CARGO' => 8, 'CARGO' => 'JEFE DE UNIDAD DE TALCAHUANO'],
            ['ID_CARGO' => 9, 'CARGO' => 'JEFE DE UNIDAD DE LOS ANGELES'],
            ['ID_CARGO' => 10, 'CARGO' => 'JEFE DE UNIDAD DE LEBU'],
            ['ID_CARGO' => 11, 'CARGO' => 'JEFE DE GRUPO CONCEPCION 1'],
            ['ID_CARGO' => 12, 'CARGO' => 'JEFE DE GRUPO CONCEPCION 2'],
            ['ID_CARGO' => 13, 'CARGO' => 'JEFE DE GRUPO CONCEPCION 3'],
            ['ID_CARGO' => 14, 'CARGO' => 'JEFE DE GRUPO CONCEPCION 4'],
            ['ID_CARGO' => 15, 'CARGO' => 'JEFE DE GRUPO CONCEPCION 5'],
            ['ID_CARGO' => 16, 'CARGO' => 'JEFE DE GRUPO CONCEPCION 6'],
            ['ID_CARGO' => 17, 'CARGO' => 'JEFE DE GRUPO CONCEPCION 7'],
            ['ID_CARGO' => 18, 'CARGO' => 'JEFE DE GRUPO CUMPLIMIENTO TRIBUTARIO EN TERRENO'],
            ['ID_CARGO' => 19, 'CARGO' => 'JEFE GRUPO N° 1 MEDIANAS Y GRANDES EMPRESAS SEDE REGIONAL CONCEPCION'],
            ['ID_CARGO' => 20, 'CARGO' => 'JEFE GRUPO N° 2 MEDIANAS Y GRANDES EMPRESAS SEDE REGIONAL CONCEPCION'],
            ['ID_CARGO' => 21, 'CARGO' => 'JEFE GRUPO N° 3 MEDIANAS Y GRANDES EMPRESAS SEDE REGIONAL CONCEPCION'],
            ['ID_CARGO' => 22, 'CARGO' => 'JEFE GRUPO N° 1 PERSONAS Y MICRO-PEQUEÑA EMPRESAS SEDE REGIONAL CONCEPCION'],
            ['ID_CARGO' => 23, 'CARGO' => 'JEFE GRUPO N° 2 PERSONAS Y MICRO-PEQUEÑA EMPRESAS SEDE REGIONAL CONCEPCION'],
            ['ID_CARGO' => 24, 'CARGO' => 'JEFE GRUPO N° 3 PERSONAS Y MICRO-PEQUEÑA EMPRESAS SEDE REGIONAL CONCEPCION'],
            ['ID_CARGO' => 25, 'CARGO' => 'JEFE GRUPO N° 4 PERSONAS Y MICRO-PEQUEÑA EMPRESAS SEDE REGIONAL CONCEPCION'],
            ['ID_CARGO' => 26, 'CARGO' => 'JEFE GRUPO N° 1 FISCALIZACION UNIDAD DE CHILLAN'],
            ['ID_CARGO' => 27, 'CARGO' => 'JEFE GRUPO N° 2 FISCALIZACION UNIDAD DE CHILLAN'],
            ['ID_CARGO' => 28, 'CARGO' => 'JEFE GRUPO N° 1 FISCALIZACION UNIDAD DE LOS ANGELES'],
            ['ID_CARGO' => 29, 'CARGO' => 'JEFE GRUPO N° 2 FISCALIZACION UNIDAD DE LOS ANGELES'],
            ['ID_CARGO' => 30, 'CARGO' => 'JEFE GRUPO N° 1 FISCALIZACION TALCAHUANO'],
            ['ID_CARGO' => 31, 'CARGO' => 'JEFE DE UNIDAD DE CHILLAN'],
            ['ID_CARGO' => 32, 'CARGO' => 'JEFE DE UNIDAD DE SAN CARLOS']
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
        //Población de la tabla 'comunas'
        Comuna::insert([
            ['ID_COMUNA' => 1, 'COMUNA' => 'ARICA', 'ID_REGION' => 1, 'ID_DIRECCION' => 1],
            ['ID_COMUNA' => 2, 'COMUNA' => 'CAMARONES', 'ID_REGION' => 1, 'ID_DIRECCION' => 1],
            ['ID_COMUNA' => 3, 'COMUNA' => 'PUTRE', 'ID_REGION' => 1, 'ID_DIRECCION' => 1],
            ['ID_COMUNA' => 4, 'COMUNA' => 'GENERAL LAGOS', 'ID_REGION' => 1, 'ID_DIRECCION' => 1],
            ['ID_COMUNA' => 5, 'COMUNA' => 'IQUIQUE', 'ID_REGION' => 2, 'ID_DIRECCION' => 3],
            ['ID_COMUNA' => 6, 'COMUNA' => 'ALTO HOSPICIO', 'ID_REGION' => 2, 'ID_DIRECCION' => 2],
            ['ID_COMUNA' => 7, 'COMUNA' => 'POZO ALMONTE', 'ID_REGION' => 2, 'ID_DIRECCION' => 3],
            ['ID_COMUNA' => 8, 'COMUNA' => 'CAMIÑA', 'ID_REGION' => 2, 'ID_DIRECCION' => 3],
            ['ID_COMUNA' => 9, 'COMUNA' => 'COLCHANE', 'ID_REGION' => 2, 'ID_DIRECCION' => 3],
            ['ID_COMUNA' => 10, 'COMUNA' => 'HUARA', 'ID_REGION' => 2, 'ID_DIRECCION' => 3],
            ['ID_COMUNA' => 11, 'COMUNA' => 'PICA', 'ID_REGION' => 2, 'ID_DIRECCION' => 3],
            /*['ID_COMUNA' => 12, 'COMUNA' => 'ANTOFAGASTA', 'ID_REGION' => 3, 'ID_DIRECCION' => 4],
            ['ID_COMUNA' => 13, 'COMUNA' => 'MEJILLONES', 'ID_REGION' => 3, 'ID_DIRECCION' => 4],
            ['ID_COMUNA' => 14, 'COMUNA' => 'SIERRA GORDA', 'ID_REGION' => 3, 'ID_DIRECCION' => 4],
            ['ID_COMUNA' => 15, 'COMUNA' => 'TAL TAL', 'ID_REGION' => 3, 'ID_DIRECCION' => 7],
            ['ID_COMUNA' => 16, 'COMUNA' => 'CALAMA', 'ID_REGION' => 3, 'ID_DIRECCION' => 5],
            ['ID_COMUNA' => 17, 'COMUNA' => 'OLLAGÜE', 'ID_REGION' => 3, 'ID_DIRECCION' => 5],
            ['ID_COMUNA' => 18, 'COMUNA' => 'SAN PEDRO DE ATACAMA', 'ID_REGION' => 3, 'ID_DIRECCION' => 5],
        ['ID_COMUNA' => 19, 'COMUNA' => 'MARÍA ELENA', 'ID_REGION' => 3, 'ID_DIRECCION' => 6],
        ['ID_COMUNA' => 20, 'COMUNA' => 'TOCOPILLA', 'ID_REGION' => 3, 'ID_DIRECCION' => 6],
        ['ID_COMUNA' => 21, 'COMUNA' => 'COPIAPÓ', 'ID_REGION' => 4, 'ID_DIRECCION' => 9],
        ['ID_COMUNA' => 22, 'COMUNA' => 'CALDERA', 'ID_REGION' => 4, 'ID_DIRECCION' => 9],
        ['ID_COMUNA' => 23, 'COMUNA' => 'TIERRA AMARILLA', 'ID_REGION' => 4, 'ID_DIRECCION' => 9],
        ['ID_COMUNA' => 24, 'COMUNA' => 'CHAÑARAL', 'ID_REGION' => 4, 'ID_DIRECCION' => 10],
        ['ID_COMUNA' => 25, 'COMUNA' => 'DIEGO DE ALMAGRO', 'ID_REGION' => 4, 'ID_DIRECCION' => 10],
        ['ID_COMUNA' => 26, 'COMUNA' => 'VALLENAR', 'ID_REGION' => 4, 'ID_DIRECCION' => 8],
        ['ID_COMUNA' => 27, 'COMUNA' => 'ALTO DEL CARMEN', 'ID_REGION' => 4, 'ID_DIRECCION' => 8],
        ['ID_COMUNA' => 28, 'COMUNA' => 'FREIRINA', 'ID_REGION' => 4, 'ID_DIRECCION' => 8],
        ['ID_COMUNA' => 29, 'COMUNA' => 'HUASCO', 'ID_REGION' => 4, 'ID_DIRECCION' => 8],
        ['ID_COMUNA' => 30, 'COMUNA' => 'LA SERENA', 'ID_REGION' => 5, 'ID_DIRECCION' => 11],
        ['ID_COMUNA' => 31, 'COMUNA' => 'COQUIMBO', 'ID_REGION' => 5, 'ID_DIRECCION' => 14],
        ['ID_COMUNA' => 32, 'COMUNA' => 'ANDACOLLO', 'ID_REGION' => 5, 'ID_DIRECCION' => 11],
        ['ID_COMUNA' => 33, 'COMUNA' => 'LA HIGUERA', 'ID_REGION' => 5, 'ID_DIRECCION' => 11],
        ['ID_COMUNA' => 34, 'COMUNA' => 'PAIGUANO', 'ID_REGION' => 5, 'ID_DIRECCION' => 11],
        ['ID_COMUNA' => 35, 'COMUNA' => 'VICUÑA', 'ID_REGION' => 5, 'ID_DIRECCION' => 11],
        ['ID_COMUNA' => 36, 'COMUNA' => 'ILLAPEL', 'ID_REGION' => 5, 'ID_DIRECCION' => 12],
        ['ID_COMUNA' => 37, 'COMUNA' => 'CANELA', 'ID_REGION' => 5, 'ID_DIRECCION' => 12],
        ['ID_COMUNA' => 38, 'COMUNA' => 'LOS VILOS', 'ID_REGION' => 5, 'ID_DIRECCION' => 12],
        ['ID_COMUNA' => 39, 'COMUNA' => 'SALAMANCA', 'ID_REGION' => 5, 'ID_DIRECCION' => 12],
        ['ID_COMUNA' => 40, 'COMUNA' => 'OVALLE', 'ID_REGION' => 5, 'ID_DIRECCION' => 13],
        ['ID_COMUNA' => 41, 'COMUNA' => 'COMBARBALÁ', 'ID_REGION' => 5, 'ID_DIRECCION' => 13],
        ['ID_COMUNA' => 42, 'COMUNA' => 'MONTE PATRIA', 'ID_REGION' => 5, 'ID_DIRECCION' => 13],
        ['ID_COMUNA' => 43, 'COMUNA' => 'PUNITAQUI', 'ID_REGION' => 5, 'ID_DIRECCION' => 13],
        ['ID_COMUNA' => 44, 'COMUNA' => 'RÍO HURTADO', 'ID_REGION' => 5, 'ID_DIRECCION' => 13],
        ['ID_COMUNA' => 45, 'COMUNA' => 'VALPARAÍSO', 'ID_REGION' => 6, 'ID_DIRECCION' => 19],
        ['ID_COMUNA' => 46, 'COMUNA' => 'CASABLANCA', 'ID_REGION' => 6, 'ID_DIRECCION' => 19],
        ['ID_COMUNA' => 47, 'COMUNA' => 'CONCÓN', 'ID_REGION' => 6, 'ID_DIRECCION' => 21],
        ['ID_COMUNA' => 48, 'COMUNA' => 'JUAN FERNÁNDEZ', 'ID_REGION' => 6, 'ID_DIRECCION' => 19],
        ['ID_COMUNA' => 49, 'COMUNA' => 'PUCHUNCAVÍ', 'ID_REGION' => 6, 'ID_DIRECCION' => 21],
        ['ID_COMUNA' => 50, 'COMUNA' => 'QUILPUÉ', 'ID_REGION' => 6, 'ID_DIRECCION' => 23],
        ['ID_COMUNA' => 51, 'COMUNA' => 'QUINTERO', 'ID_REGION' => 6, 'ID_DIRECCION' => 21],
        ['ID_COMUNA' => 52, 'COMUNA' => 'VILLA ALEMANA', 'ID_REGION' => 6, 'ID_DIRECCION' => 23],
        ['ID_COMUNA' => 53, 'COMUNA' => 'VIÑA DEL MAR', 'ID_REGION' => 6, 'ID_DIRECCION' => 21],
        ['ID_COMUNA' => 54, 'COMUNA' => 'ZAPALLAR', 'ID_REGION' => 6, 'ID_DIRECCION' => 16],
        ['ID_COMUNA' => 55, 'COMUNA' => 'LA LIGUA', 'ID_REGION' => 6, 'ID_DIRECCION' => 16],
        ['ID_COMUNA' => 56, 'COMUNA' => 'PAPUDO', 'ID_REGION' => 6, 'ID_DIRECCION' => 16],
        ['ID_COMUNA' => 57, 'COMUNA' => 'PETORCA', 'ID_REGION' => 6, 'ID_DIRECCION' => 16],
        ['ID_COMUNA' => 58, 'COMUNA' => 'CABILDO', 'ID_REGION' => 6, 'ID_DIRECCION' => 16],
        ['ID_COMUNA' => 59, 'COMUNA' => 'CALLE LARGA', 'ID_REGION' => 6, 'ID_DIRECCION' => 17],
        ['ID_COMUNA' => 60, 'COMUNA' => 'LOS ANDES', 'ID_REGION' => 6, 'ID_DIRECCION' => 17],
        ['ID_COMUNA' => 61, 'COMUNA' => 'RINCONADA', 'ID_REGION' => 6, 'ID_DIRECCION' => 17],
        ['ID_COMUNA' => 62, 'COMUNA' => 'SAN ESTEBAN', 'ID_REGION' => 6, 'ID_DIRECCION' => 17],
        ['ID_COMUNA' => 63, 'COMUNA' => 'LA CALERA', 'ID_REGION' => 6, 'ID_DIRECCION' => 22],
        ['ID_COMUNA' => 64, 'COMUNA' => 'HIJUELAS', 'ID_REGION' => 6, 'ID_DIRECCION' => 22],
        ['ID_COMUNA' => 65, 'COMUNA' => 'LA CRUZ', 'ID_REGION' => 6, 'ID_DIRECCION' => 22],
        ['ID_COMUNA' => 66, 'COMUNA' => 'NOGALES', 'ID_REGION' => 6, 'ID_DIRECCION' => 22],
        ['ID_COMUNA' => 67, 'COMUNA' => 'QUILLOTA', 'ID_REGION' => 6, 'ID_DIRECCION' => 22],
        ['ID_COMUNA' => 68, 'COMUNA' => 'LA CALERA', 'ID_REGION' => 6, 'ID_DIRECCION' => 22],
        ['ID_COMUNA' => 69, 'COMUNA' => 'LIMACHE', 'ID_REGION' => 6, 'ID_DIRECCION' => 22],
        ['ID_COMUNA' => 70, 'COMUNA' => 'OLMUÉ', 'ID_REGION' => 6, 'ID_DIRECCION' => 22],
        ['ID_COMUNA' => 71, 'COMUNA' => 'CERRILLOS', 'ID_REGION' => 7, 'ID_DIRECCION' => 27],
        ['ID_COMUNA' => 72, 'COMUNA' => 'CERRO NAVIA', 'ID_REGION' => 7, 'ID_DIRECCION' => 28],
        ['ID_COMUNA' => 73, 'COMUNA' => 'CONCHALÍ', 'ID_REGION' => 7, 'ID_DIRECCION' => 29],
        ['ID_COMUNA' => 74, 'COMUNA' => 'EL BOSQUE', 'ID_REGION' => 7, 'ID_DIRECCION' => 26],
        ['ID_COMUNA' => 75, 'COMUNA' => 'ESTACIÓN CENTRAL', 'ID_REGION' => 7, 'ID_DIRECCION' => 28],
        ['ID_COMUNA' => 76, 'COMUNA' => 'HUECHURABA', 'ID_REGION' => 7, 'ID_DIRECCION' => 29],
        ['ID_COMUNA' => 77, 'COMUNA' => 'INDEPENDENCIA', 'ID_REGION' => 7, 'ID_DIRECCION' => 29],
        ['ID_COMUNA' => 78, 'COMUNA' => 'LA CISTERNA', 'ID_REGION' => 7, 'ID_DIRECCION' => 30],
        ['ID_COMUNA' => 79, 'COMUNA' => 'LA FLORIDA', 'ID_REGION' => 7, 'ID_DIRECCION' => 31],
        ['ID_COMUNA' => 80, 'COMUNA' => 'LA GRANJA', 'ID_REGION' => 7, 'ID_DIRECCION' => 30],
        ['ID_COMUNA' => 81, 'COMUNA' => 'LA PINTANA', 'ID_REGION' => 7, 'ID_DIRECCION' => 30],
        ['ID_COMUNA' => 82, 'COMUNA' => 'LA REINA', 'ID_REGION' => 7, 'ID_DIRECCION' => 32],
        ['ID_COMUNA' => 83, 'COMUNA' => 'LAS CONDES', 'ID_REGION' => 7, 'ID_DIRECCION' => 33],
        ['ID_COMUNA' => 84, 'COMUNA' => 'LO BARNECHEA', 'ID_REGION' => 7, 'ID_DIRECCION' => 33],
        ['ID_COMUNA' => 85, 'COMUNA' => 'LO ESPEJO', 'ID_REGION' => 7, 'ID_DIRECCION' => 30],
        ['ID_COMUNA' => 86, 'COMUNA' => 'LO PRADO', 'ID_REGION' => 7, 'ID_DIRECCION' => 28],
        ['ID_COMUNA' => 87, 'COMUNA' => 'MACUL', 'ID_REGION' => 7, 'ID_DIRECCION' => 32],
        ['ID_COMUNA' => 88, 'COMUNA' => 'MAIPÚ', 'ID_REGION' => 7, 'ID_DIRECCION' => 27],
        ['ID_COMUNA' => 89, 'COMUNA' => 'ÑUÑOA', 'ID_REGION' => 7, 'ID_DIRECCION' => 32],
        ['ID_COMUNA' => 90, 'COMUNA' => 'PEDRO AGUIRRE CERDA', 'ID_REGION' => 7, 'ID_DIRECCION' => 30],
        ['ID_COMUNA' => 91, 'COMUNA' => 'PEÑALOLÉN', 'ID_REGION' => 7, 'ID_DIRECCION' => 32],
        ['ID_COMUNA' => 92, 'COMUNA' => 'PROVIDENCIA', 'ID_REGION' => 7, 'ID_DIRECCION' => 41],
        ['ID_COMUNA' => 93, 'COMUNA' => 'PUDAHUEL', 'ID_REGION' => 7, 'ID_DIRECCION' => 28],
        ['ID_COMUNA' => 94, 'COMUNA' => 'PUENTE ALTO', 'ID_REGION' => 7, 'ID_DIRECCION' => 31],
        ['ID_COMUNA' => 95, 'COMUNA' => 'QUILICURA', 'ID_REGION' => 7, 'ID_DIRECCION' => 29],
        ['ID_COMUNA' => 96, 'COMUNA' => 'QUINTA NORMAL', 'ID_REGION' => 7, 'ID_DIRECCION' => 28],
        ['ID_COMUNA' => 97, 'COMUNA' => 'RECOLETA', 'ID_REGION' => 7, 'ID_DIRECCION' => 29],
        ['ID_COMUNA' => 98, 'COMUNA' => 'RENCA', 'ID_REGION' => 7, 'ID_DIRECCION' => 28],
        ['ID_COMUNA' => 99, 'COMUNA' => 'SAN BERNARDO', 'ID_REGION' => 7, 'ID_DIRECCION' => 26],
        ['ID_COMUNA' => 100, 'COMUNA' => 'SAN JOAQUÍN', 'ID_REGION' => 7, 'ID_DIRECCION' => 30],
        */]);



    }
}
