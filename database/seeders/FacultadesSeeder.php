<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facultad;

class FacultadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facultades = [
            [
                'ID_FACULTAD' => 1,
                'NOMBRE' => 'CITAR CONFORME ART 63 CT',
                'CONTENIDO' => 'PRIMERO: Delego la facultad de citar a los contribuyentes de conformidad a lo previsto en el artículo 63 inciso Segundo del Código Tributario, conceder las prórrogas solicitadas, hasta por un mes, del plazo referido en el inciso citado y solicitar antecedentes de conformidad a lo dispuesto en el inciso tercero de la norma legal en comento.
                                SEGUNDO: Los documentos que se emitan en virtud de esta delegación de facultades deberán citar el número y fecha de la presente Resolución e incluir, antes de la firma del delegado, la frase "Por orden del Director Regional". ',
                'LEY_ASOCIADA' => 'Código Tributario',
                'ART_LEY_ASOCIADA' => 63
            ],
            [
                'ID_FACULTAD' => 2,
                'NOMBRE' => 'APLICAR SANCIONES ADMINISTRATIVAS 97 N° 15 Y 16 Y EN EL ARTICULO 109',
                'CONTENIDO' => 'La facultad de aplicar las sanciones administrativas que correspondan respecto de las infracciones tributarias previstas y tipificadas en los artículos 97 N° 15 y 16 y en el artículo 109, todos del Código Tributario, cuando no se haya reclamado de ellas, como asimismo, para conceder las condonaciones que se soliciten respecto de las sanciones que les corresponda aplicar, o disponer la anulación de las referidas infracciones siempre que se cumplan las condiciones establecidas en las resoluciones e instrucciones dictadas al efecto. ',
                'LEY_ASOCIADA' => 'Código Tributario',
                'ART_LEY_ASOCIADA' => 165
            ],
            [
                'ID_FACULTAD' => 3,
                'NOMBRE' => 'TERMINAR FRANQUICIAS DFL 2 de 1959',
                'CONTENIDO' => 'Facultad de dejar sin efecto o caducar los beneficios, franquicias y exenciones de aquellas viviendas económicas en que se comprobare la existencia de alguna infracción, en conformidad a lo establecido en el artículo 50 del D.F.L. N° 2, de 1959, como asimismo, para declarar la caducidad de dichos beneficios, franquicias y exenciones en los casos previstos en el artículo 18 del mismo cuerpo legal. ',
                'LEY_ASOCIADA' => 'DFL N° 2 DE 1959',
                'ART_LEY_ASOCIADA' => 50
            ],
            [
                'ID_FACULTAD' => 4,
                'NOMBRE' => 'REQUERIR INFORMACION A MUNICIPALIDADES AVALUO SITIOS NO EDIFICADOS, PROPIEDADES ABANDONADAS, POZOS LASTREROS. 1',
                'CONTENIDO' => 'La facultad de requerir información a las Municipalidades, conforme a lo previsto en los artículos 83 y 87 del Código Tributario, y/o dar respuesta a los requerimientos de información de éstas, en los casos que ello sea pertinente, en el curso de la tramitación de los procedimientos administrativos referidos en la Circular N° 54 de 2012. (esta circular fue dejada sin efecto por la Circular 7 de 2017)',
                'LEY_ASOCIADA' => 'Código Tributario',
                'ART_LEY_ASOCIADA' => 87
            ],
            [
                'ID_FACULTAD' => 5,
                'NOMBRE' => 'REQUERIR INFORMACION A MUNICIPALIDADES AVALUO SITIOS NO EDIFICADOS, PROPIEDADES ABANDONADAS, POZOS LASTREROS. 2',
                'CONTENIDO' => 'Delegase la facultad de requerir información a las Municipalidades, conforme a lo previsto en el artículo 87 del Código Tributario, y/o dar respuesta a los requerimientos de información de éstas, en los casos que ello sea pertinente, en el curso de la tramitación de los procedimientos administrativos referidos en la Circular N° 54 de 2012. (esta circular fue dejada sin efecto por la Circular 7 de 2017)',
                'LEY_ASOCIADA' => 'Código Tributario',
                'ART_LEY_ASOCIADA' => 87
            ],
            [
                'ID_FACULTAD' => 6,
                'NOMBRE' => 'APLICAR SANCIONES ADMINISTRATIVAS 97 NUMEROS 3, 6, 7, 10, 15, 16, 17, 19, 20 y 21 Y EN EL ARTICULO 109',
                'CONTENIDO' => 'Aplicar las sanciones administrativas que correspondan respecto de las infracciones tributarias previstas y tipificadas en el artículo 97 números 3, 6, 7, 10, 15, 16, 17, 19, 20 y 21 y en el artículo 109, ambos del Código Tributario, contenido en el artículo 10 del D.C. 830 de 1974, cuando no se haya reclamado de ellas, y además, conceder las condonaciones que se soliciten respecto de las sanciones que les corresponda aplicar, siempre que se cumplan las condiciones establecidas en las resoluciones e instrucciones dictadas al efecto; 
                                El funcionario designado, al hacer uso de las facultades delegadas, deberá mencionar la presente Resolución, por su número y fecha, y anteponer a su firma la frase "Por orden del Director Regional". ',
                'LEY_ASOCIADA' => 'Código Tributario',
                'ART_LEY_ASOCIADA' => 165
            ],
            [
                'ID_FACULTAD' => 7,
                'NOMBRE' => 'RESOLVER PETICIONES FUNDADAS EN VICIOS O ERRORES MANIFIESTOS',
                'CONTENIDO' => 'Resolver administrativamente, de acuerdo a lo señalado en el artículo 60, letra B, NO 5 del Código Tributario, contenido en el artículo 10 del D.C. 830 de 1974, las peticiones de revisión fundadas en vicios o errores manifiestos que se deduzcan en cualquier tiempo, respecto de las liquidaciones, giros o resoluciones que incidan en el pago de un impuesto o en los elementos que sirvan de base para determinarlo o que denieguen cualquiera de las peticiones a que se refiere el artículo 126 del citado cuerpo legal; 
                                El funcionario designado, al hacer uso de las facultades delegadas, deberá mencionar la presente Resolución, por su número y fecha, y anteponer a su firma la frase "Por orden del Director Regional". ',
                'LEY_ASOCIADA' => 'Código Tributario',
                'ART_LEY_ASOCIADA' => '6 Letra B N° 5'
            ],
            [
                'ID_FACULTAD' => 8,
                'NOMBRE' => 'RESOLVER RECURSOS DE REPOSICION ADMINISTRATIVA',
                'CONTENIDO' => 'Resolver los recursos de reposición administrativa interpuestos por los contribuyentes de acuerdo con lo dispuesto en el artículo 123 bis del Código Tributario, respecto de las resoluciones, giros y liquidaciones dictadas por la respectiva Dirección Regional. 
                                El funcionario designado, al hacer uso de las facultades delegadas, deberá mencionar la presente Resolución, por su número y fecha, y anteponer a su firma la frase "Por orden del Director Regional". ',
                'LEY_ASOCIADA' => 'Código Tributario',
                'ART_LEY_ASOCIADA' => '123 BIS'
            ],
            [
                'ID_FACULTAD' => 9,
                'NOMBRE' => 'REQUERIR INFORMACION A MUNICIPALIDADES AVALUO SITIOS NO EDIFICADOS, PROPIEDADES ABANDONADAS, POZOS LASTREROS. 1',
                'CONTENIDO' => 'Delegase en el Jefe del Departamento de Avaluaciones de la VIII Dirección Regional y en los Jefes de las Unidades dependientes de la VIII Dirección Concepción, la facultad de requerir información a las Municipalidades, conforme a lo previsto en los artículos 83 y 87 del Código Tributario, y/o dar respuesta a los requerimientos de información de éstas, en los casos que ello sea pertinente, en el curso de la tramitación de los procedimientos administrativos referidos en la Circular N° 14 de 2012. (esta circular fue dejada sin efecto por la Circular 54 de 2012)',
                'LEY_ASOCIADA' => 'Código Tributario',
                'ART_LEY_ASOCIADA' => 87
            ],
            [
                'ID_FACULTAD' => 10,
                'NOMBRE' => 'FIRMAR RESOLUCIONES SOBRE CONCESIONES MARITIMAS',
                'CONTENIDO' => 'Delégase, en el Jefe del Departamento de Avaluaciones de la VIII Dirección Regional, la facultad de firmar las resoluciones que fijan el valor comercial de las mejoras fiscales incluidas en las solicitudes de concesiones marítimas mayores o menores, o de su renovación, y permisos o autorizaciones que se relacionen con ellas. ',
                'LEY_ASOCIADA' => 'Código Tributario',
                'ART_LEY_ASOCIADA' => '69 N° 3'
            ],
            [
                'ID_FACULTAD' => 11,
                'NOMBRE' => 'APLICAR SANCIONES ADMINISTRATIVAS 165 CT',
                'CONTENIDO' => '(?)',
                'LEY_ASOCIADA' => '(?)',
                'ART_LEY_ASOCIADA' => '(?)'
            ]
        ];

        foreach ($facultades as $facultad) {
            Facultad::create($facultad);
        }
    }
}
