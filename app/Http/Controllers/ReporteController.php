<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Primer Grafico.
use App\Models\SolicitudSala;
use App\Models\SolicitudBodegas;
use App\Models\SolicitudReparacionVehiculo;
use App\Models\RelFunVeh;
// Segundo Grafico.
use App\Models\RelFunRepGeneral;
use App\Models\SolicitudEquipos;
use App\Models\SolicitudFormulario;
use App\Models\SolicitudMateriales;
// Tercer Grafico.
use App\Models\User;
use App\Models\Sexo;
use Carbon\Carbon;
// Cuarto Grafico.
use App\Models\Vehiculo;
// Quinto Grafico.
use Spatie\Permission\Models\Role;
use App\Models\TipoMaterial;
use App\Models\Material;
//Exploradores
use App\Models\Region;
use App\Models\Ubicacion;
use App\Models\DireccionRegional;

class ReporteController extends Controller
{
    private $models1 = [
        'solicitudSala' => SolicitudSala::class,
        'solicitudBodegas' => SolicitudBodegas::class,
        'solicitudReparacionVehiculo' => SolicitudReparacionVehiculo::class,
        'relFunVeh' => RelFunVeh::class,
    ];

    private $models2 = [
        'solicitudMateriales' => SolicitudMateriales::class,
        'relFunRepGeneral' => RelFunRepGeneral::class,
        'solicitudFormularios' => SolicitudFormulario::class,
        'solicitudEquipos' => SolicitudEquipos::class,
    ];

    private $models3 = [
        'tipomateial' => tipoMaterial::class,
        'material' => Material::class,
    ];



    //obtener historico
    public function index()
    {
        // Primer gráfico Total de solicitudes 1
        $grafico = $this->getGraficoData();
        // Segundo gráfico Total de solicitudes 2
        $grafico1 = $this->getGrafico1Data();
        // Tercer gráfico Total de Funcionarios (Hombres/mujeres)
        $grafico2 = $this->getGrafico2Data();
        // Cuarto gráfico Vehiculos asignados.
        $grafico3 = $this->getGrafico3Data();
        // Quinto gráfico estados de solicitudes de materiales.
        $grafico5 = $this->getGrafico5Data();
        // Sexto gráfico estados de solicitudes de materiales/mes.
        $grafico6 = $this->getGrafico6Data();

        $grafico7 = $this->getGrafico7Data();

        $grafico8 = $this->getGrafico8Data();

        $grafico9 = $this->getGrafico9Data();

        $grafico10 = $this->getGrafico10Data();

        $grafico11 = $this->getGrafico11Data();

        $grafico12 = $this->getGrafico12Data();

        $grafico13 = $this->getGrafico13Data();

        //Departamentos
        $regiones = Region::all();
        $ubicaciones = Ubicacion::all();
        $totals = $this->getTotalsPorUbicacion($ubicaciones);
        //regiones
        $direcciones = DireccionRegional::all();
        // Devolver la vista con los datos

        return view('reportes.index', compact('grafico', 'grafico1', 'grafico2', 'grafico3', 'grafico5', 'grafico6','grafico7', 'grafico8', 'grafico9','grafico10', 'grafico11', 'grafico12', 'grafico13', 'ubicaciones', 'regiones','direcciones', 'totals'));
    }

    public function getTotalsPorUbicacion($ubicacionId)
    {
        $ubicacion = Ubicacion::find($ubicacionId);

        if (!$ubicacion) {
            return response()->json(['error' => 'Ubicación no encontrada'], 404);
        }

        if($ubicacion instanceof \Illuminate\Database\Eloquent\Collection){
            return response()->json(['error' => 'Esperaba un modelo de ubicación, pero se obtuvo una colección.'], 500);
        }

        $hombres = User::where('ID_UBICACION', $ubicacion->ID_UBICACION)->where('ID_SEXO', 1)->count();
        $mujeres = User::where('ID_UBICACION', $ubicacion->ID_UBICACION)->where('ID_SEXO', 2)->count();
        $total = $hombres + $mujeres;

        return response()->json([
            'ubicacion' => $ubicacion->UBICACION,
            'hombres' => $hombres,
            'mujeres' => $mujeres,
            'total' => $total
        ]);
    }

    //obtener por fecha
    public function obtenerDatos(Request $request)
    {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        $fechaInicio = Carbon::parse($fechaInicio);
        $fechaFin = Carbon::parse($fechaFin)->endOfDay();

        $data = [
            'grafico' => $this->getGraficoData($fechaInicio, $fechaFin),
            'grafico1' => $this->getGrafico1Data($fechaInicio, $fechaFin),
            'grafico2' => $this->getGrafico2Data($fechaInicio, $fechaFin),
            'grafico3' => $this->getGrafico3Data($fechaInicio, $fechaFin),
            'grafico5' => $this->getGrafico5Data($fechaInicio, $fechaFin),
            'grafico6' => $this->getGrafico6Data($fechaInicio, $fechaFin),
            'grafico7' => $this->getGrafico7Data($fechaInicio, $fechaFin),
            'grafico8' => $this->getGrafico8Data($fechaInicio, $fechaFin),
            'grafico9' => $this->getGrafico9Data($fechaInicio, $fechaFin),
            'grafico10' => $this->getGrafico10Data($fechaInicio, $fechaFin),
            'grafico11' => $this->getGrafico11Data($fechaInicio, $fechaFin),
            'grafico12' => $this->getGrafico12Data($fechaInicio, $fechaFin),
            'grafico13' => $this->getGrafico13Data($fechaInicio, $fechaFin),
        ];

        return response()->json($data);
    }

    private function getGraficoData($fechaInicio = null, $fechaFin = null)
    {
        $grafico = [];

        foreach ($this->models1 as $key => $modelClass) {
            $model = new $modelClass;
            if ($fechaInicio && $fechaFin) {
                $grafico[$key] = $model->whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
            } else {
                $grafico[$key] = $model->count();
            }
        }

        return $grafico;
    }

    private function getGrafico1Data($fechaInicio = null, $fechaFin = null)
    {
        $grafico1 = [];

        foreach ($this->models2 as $key => $modelClass) {
            $model = new $modelClass;
            if ($fechaInicio && $fechaFin) {
                $grafico1[$key] = $model->whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
            } else {
                $grafico1[$key] = $model->count();
            }
        }

        return $grafico1;
    }

    private function getGrafico2Data($fechaInicio = null, $fechaFin = null)
    {
        $grafico2 = [];

        $totalHombres = User::where('ID_SEXO', '=', '1');
        $totalMujeres = User::where('ID_SEXO', '=', '2');

        if ($fechaInicio && $fechaFin) {
            $totalHombres->whereBetween('FECHA_INGRESO', [$fechaInicio, $fechaFin]);
            $totalMujeres->whereBetween('FECHA_INGRESO', [$fechaInicio, $fechaFin]);
        }


        $grafico2 = [
            'totalHombres' => $totalHombres->count(),
            'totalMujeres' => $totalMujeres->count(),
        ];

        return $grafico2;
    }
    public function getGrafico3Data($fechaInicio = null, $fechaFin = null)
    {
        $solicitudesQuery = RelFunVeh::whereNotNull('PATENTE_VEHICULO');

        if($fechaInicio && $fechaFin){
            $solicitudesQuery->whereBetween('created_at', [$fechaInicio, $fechaFin]);
        }

        $solicitudes = $solicitudesQuery->get();

        $grafico3 = [];

        // Agrupa las solicitudes por patente y cuenta las filas para cada patente
        $conteosPorPatente = $solicitudes->groupBy('PATENTE_VEHICULO')->map->count();

        // Itera sobre los conteos por patente y crea el array para el gráfico
        foreach ($conteosPorPatente as $patente => $conteo) {
            $grafico3[] = [
                'patente' => $patente,
                'conteo' => $conteo
            ];
        }

        return $grafico3;
    }

    //*Grafico 5 : Gestionadores de solicitudes de materiales */
    public function getGrafico5Data($fechaInicio = null, $fechaFin = null)
    {
        // Obtén el rol 'SERVICIOS'
        $rolServicios = Role::where('name', 'SERVICIOS')->first();

        // Obtén la colección de usuarios con el rol 'SERVICIOS'
        $usuariosServicios = $rolServicios->users;

        $grafico5 = [];

        // Iterar sobre los usuarios y realizar el conteo de solicitudes gestionadas
        foreach ($usuariosServicios as $usuario) {
            $nombreCompleto = $usuario->NOMBRES . ' ' . $usuario->APELLIDOS;
            // Realizar consulta para contar las solicitudes gestionadas por el usuario
            if ($fechaInicio && $fechaFin) {
                $conteo = SolicitudMateriales::where('MODIFICADO_POR', $nombreCompleto)->whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
            } else {
                $conteo = SolicitudMateriales::where('MODIFICADO_POR', $nombreCompleto)->count();
            }
            $grafico5[] = [
                'nombre' => $nombreCompleto,
                'conteo' => $conteo
            ];
        }
        // Devolver los datos para el gráfico de Chart.js
        return $grafico5;
    }

    //!!Grafico 6
    public function getGrafico6Data($fechaInicio = null, $fechaFin = null) {
        $ubicacionUser = Ubicacion::where('ID_UBICACION', auth()->user()->ID_UBICACION)->first();
        $grafico6 = [];

        if($ubicacionUser){
            $direccionFiltrada = DireccionRegional::where('ID_DIRECCION', $ubicacionUser->ID_DIRECCION)->first();
            if($direccionFiltrada){
                $ubicacionesFiltradas = Ubicacion::where('ID_DIRECCION', $direccionFiltrada->ID_DIRECCION)->pluck('ID_UBICACION');
                // Definimos los estados que necesitamos contar
                $estados = ['INGRESADO', 'EN REVISION', 'ACEPTADO', 'EN ESPERA', 'RECHAZADO', 'TERMINADO'];

                foreach ($estados as $estado) {
                    if ($fechaInicio && $fechaFin) {

                        $conteo = SolicitudMateriales::whereBetween('created_at', [$fechaInicio, $fechaFin])
                                                    ->where('ESTADO_SOL', $estado)
                                                    ->count();
                    } else {
                        $conteo = SolicitudMateriales::where('ESTADO_SOL', $estado)
                                                    ->count();
                    }

                    $grafico6[] = [
                        'estado' => $estado,
                        'conteo' => $conteo,
                    ];
                }

                return $grafico6;
            } else {
                return ['error' => 'No se pudo encontrar la dirección regional'];
            }
        } else {
            return ['error' => 'No se pudo encontrar la ubicación del usuario'];
        }
    }


    //*Grafico 7: Solicitudes de materiales por Ubicacion/Depto */
    //!!Agregar validacion de regiones
    public function getGrafico7Data($fechaInicio = null, $fechaFin = null)
    {
        $ubicacionUser = Ubicacion::where('ID_UBICACION', auth()->user()->ID_UBICACION)->first(); //Obtuve la ubicacion del user
        if($ubicacionUser){
            $direccionFiltrada = DireccionRegional::where('ID_DIRECCION', $ubicacionUser->ID_DIRECCION)->first();
            if($direccionFiltrada){
                $ubicacionesFiltradas = Ubicacion::where('ID_DIRECCION', $direccionFiltrada->ID_DIRECCION)->get();
                // Aquí ya tendrías tus ubicaciones filtradas
            } else {
                // Trata el caso en que no se encuentre la dirección
            }
        } else {
            // Trata el caso en que no se encuentre la ubicación del usuario
        }

        $grafico7 = [];

        // Itera sobre cada ubicación
        foreach ($ubicacionesFiltradas as $ubicacion) {
            // Obten todas las solicitudes para esta ubicación
            if($fechaInicio && $fechaFin){
                $solicitudes = SolicitudMateriales::where('DEPTO', $ubicacion->UBICACION)->whereBetween('created_at', [$fechaInicio, $fechaFin])->get();
            }else{
                $solicitudes = SolicitudMateriales::where('DEPTO', $ubicacion->UBICACION)->get();
            }

            // Obten el conteo de solicitudes
            $conteo = $solicitudes->count();

            // Agrega los datos de esta ubicación al array del gráfico
            $grafico7[] = [
                'ubicacion' => $ubicacion->UBICACION,
                'conteo' => $conteo,
                'region' => $ubicacion->direccion->region->REGION
            ];
        }

        return $grafico7;
    }

    //Grafico 8
    public function getGrafico8Data($fechaInicio = null, $fechaFin = null){
        $ubicacionUser = Ubicacion::where('ID_UBICACION', auth()->user()->ID_UBICACION)->first();
        $grafico8 = [];

        if($ubicacionUser){
            $direccionFiltrada = DireccionRegional::where('ID_DIRECCION', $ubicacionUser->ID_DIRECCION)->first();
            if($direccionFiltrada){
                $ubicacionesFiltradas = Ubicacion::where('ID_DIRECCION', $direccionFiltrada->ID_DIRECCION)->pluck('ID_UBICACION');
                // Definimos los estados que necesitamos contar
                $estados = ['INGRESADO', 'POR AUTORIZAR', 'SUSPENDIDO', 'RECHAZADO', 'POR RENDIR'];

                foreach ($estados as $estado) {
                    if ($fechaInicio && $fechaFin) {

                        $conteo = RelFunVeh::whereBetween('created_at', [$fechaInicio, $fechaFin])
                                                    ->where('ESTADO_SOL_VEH', $estado)
                                                    ->count();
                    } else {
                        $conteo = RelFunVeh::where('ESTADO_SOL_VEH', $estado)
                                                    ->count();
                    }

                    $grafico8[] = [
                        'estado' => $estado,
                        'conteo' => $conteo,
                    ];
                }

                return $grafico8;
            } else {
                return ['error' => 'No se pudo encontrar la dirección regional'];
            }
        } else {
            return ['error' => 'No se pudo encontrar la ubicación del usuario'];
        }
    }

    //!!Grafico 9
    public function getGrafico9Data($fechaInicio = null, $fechaFin = null){
        $ubicacionUser = Ubicacion::where('ID_UBICACION', auth()->user()->ID_UBICACION)->first(); //Obtuve la ubicacion del user
        if($ubicacionUser){
            $direccionFiltrada = DireccionRegional::where('ID_DIRECCION', $ubicacionUser->ID_DIRECCION)->first();
            if($direccionFiltrada){
                $ubicacionesFiltradas = Ubicacion::where('ID_DIRECCION', $direccionFiltrada->ID_DIRECCION)->get();
                // Aquí ya tendrías tus ubicaciones filtradas
            } else {
                // Trata el caso en que no se encuentre la dirección
            }
        } else {
            // Trata el caso en que no se encuentre la ubicación del usuario
        }

        $grafico9 = [];

        // Itera sobre cada ubicación
        foreach ($ubicacionesFiltradas as $ubicacion) {
            // Obten todas las solicitudes para esta ubicación
            if($fechaInicio && $fechaFin){
                $solicitudes = RelFunVeh::where('DEPTO', $ubicacion->UBICACION)->whereBetween('created_at', [$fechaInicio, $fechaFin])->get();
            }else{
                $solicitudes = RelFunVeh::where('DEPTO', $ubicacion->UBICACION)->get();
            }

            // Obten el conteo de solicitudes
            $conteo = $solicitudes->count();

            // Agrega los datos de esta ubicación al array del gráfico
            $grafico9[] = [
                'ubicacion' => $ubicacion->UBICACION,
                'conteo' => $conteo,
                'region' => $ubicacion->direccion->region->REGION
            ];
        }

        return $grafico9;
    }
    //!!Grafico 10
    public function getGrafico10Data($fechaInicio = null, $fechaFin = null){
        // Obtén el rol 'SERVICIOS'
        $rolServicios = Role::where('name', 'SERVICIOS')->first();

        // Obtén la colección de usuarios con el rol 'SERVICIOS'
        $usuariosServicios = $rolServicios->users;

        $grafico10 = [];

        // Iterar sobre los usuarios y realizar el conteo de solicitudes gestionadas
        foreach ($usuariosServicios as $usuario) {
            $nombreCompleto = $usuario->NOMBRES . ' ' . $usuario->APELLIDOS;
            // Realizar consulta para contar las solicitudes gestionadas por el usuario
            if ($fechaInicio && $fechaFin) {
                $conteo = RelFunVeh::where('MODIFICADO_POR_SOL_VEH', $nombreCompleto)->whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
            } else {
                $conteo = RelFunVeh::where('MODIFICADO_POR_SOL_VEH', $nombreCompleto)->count();
            }
            $grafico10[] = [
                'nombre' => $nombreCompleto,
                'conteo' => $conteo
            ];
        }
        // Devolver los datos para el gráfico de Chart.js
        return $grafico10;
    }

    //!! Grafico11
    public function getGrafico11Data($fechaInicio = null, $fechaFin = null){
        $solicitudesQuery = SolicitudSala::whereNotNull('SALA_A_ASIGNAR');

        if($fechaInicio && $fechaFin){
            $solicitudesQuery->whereBetween('created_at', [$fechaInicio, $fechaFin]);
        }

        $solicitudes = $solicitudesQuery->get();

        $grafico11 = [];

        // Agrupa las solicitudes por sala y cuenta las filas para cada sala
        $conteosPorSala = $solicitudes->groupBy('SALA_A_ASIGNAR')->map->count();

        // Itera sobre los conteos por sala y crea el array para el gráfico
        foreach ($conteosPorSala as $sala => $conteo) {
            $grafico11[] = [
                'sala' => $sala,
                'conteo' => $conteo
            ];
        }

        return $grafico11;
    }

    //!! Grafico12
    public function getGrafico12Data($fechaInicio = null, $fechaFin = null){
        $ubicacionUser = Ubicacion::where('ID_UBICACION', auth()->user()->ID_UBICACION)->first(); //Obtuve la ubicacion del user
        if($ubicacionUser){
            $direccionFiltrada = DireccionRegional::where('ID_DIRECCION', $ubicacionUser->ID_DIRECCION)->first();
            if($direccionFiltrada){
                $ubicacionesFiltradas = Ubicacion::where('ID_DIRECCION', $direccionFiltrada->ID_DIRECCION)->get();
                // Aquí ya tendrías tus ubicaciones filtradas
            } else {
                // Trata el caso en que no se encuentre la dirección
            }
        } else {
            // Trata el caso en que no se encuentre la ubicación del usuario
        }

        $grafico12 = [];

        // Itera sobre cada ubicación
        foreach ($ubicacionesFiltradas as $ubicacion) {
            // Obten todas las solicitudes para esta ubicación
            if($fechaInicio && $fechaFin){
                $solicitudes = SolicitudSala::where('DEPTO', $ubicacion->UBICACION)->whereBetween('created_at', [$fechaInicio, $fechaFin])->get();
            }else{
                $solicitudes = SolicitudSala::where('DEPTO', $ubicacion->UBICACION)->get();
            }

            // Obten el conteo de solicitudes
            $conteo = $solicitudes->count();

            // Agrega los datos de esta ubicación al array del gráfico
            $grafico12[] = [
                'ubicacion' => $ubicacion->UBICACION,
                'conteo' => $conteo,
                'region' => $ubicacion->direccion->region->REGION
            ];
        }

        return $grafico12;
    }

    //!! Grafico13
    public function getGrafico13Data($fechaInicio = null, $fechaFin = null){
        // Obtén el rol 'SERVICIOS'
        $rolServicios = Role::where('name', 'INFORMATICA')->first();

        // Obtén la colección de usuarios con el rol 'SERVICIOS'
        $usuariosServicios = $rolServicios->users;

        $grafico13 = [];

        // Iterar sobre los usuarios y realizar el conteo de solicitudes gestionadas
        foreach ($usuariosServicios as $usuario) {
            $nombreCompleto = $usuario->NOMBRES . ' ' . $usuario->APELLIDOS;
            // Realizar consulta para contar las solicitudes gestionadas por el usuario
            if ($fechaInicio && $fechaFin) {
                $conteo = SolicitudSala::where('MODIFICADO_POR_SOL_SALA', $nombreCompleto)->whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
            } else {
                $conteo = SolicitudSala::where('MODIFICADO_POR_SOL_SALA', $nombreCompleto)->count();
            }
            $grafico13[] = [
                'nombre' => $nombreCompleto,
                'conteo' => $conteo
            ];
        }
        // Devolver los datos para el gráfico de Chart.js
        return $grafico13;
    }
}
