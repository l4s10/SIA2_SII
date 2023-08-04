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
use App\Models\TipoReparacion;

class HomeReportesController extends Controller
{
    //protege las rutas  DE MOMENTO SOLO ADMINISTADOR
    public function __construct(){
        $this->middleware(['auth', 'checkearRol:ADMINISTRADOR']);
    }

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

    //DASHBOARD
    public function Home(){
        return view('reporteshome.home');
    }

    //VEHICULOS
    public function VehiculosReport(){
        // gráfico Vehiculos asignados.
        $grafico3 = $this->getGrafico3Data();
        // gráfico Vehiculos asignados.
        $grafico8 = $this->getGrafico8Data();
        // gráfico Total de solicitudes.
        $grafico9 = $this->getGrafico9Data();
        // gráfico Total de solicitudes.
        $grafico10 = $this->getGrafico10Data();
        return view('reporteshome.vehiculos.index', compact('grafico3', 'grafico8', 'grafico9','grafico10'));
    }

    //MATERIALES
    public function MaterialsReport(){
        $grafico5 = $this->getGrafico5Data();
        // gráfico estados de solicitudes de materiales/mes.
        $grafico6 = $this->getGrafico6Data();
        // gráfico Total de solicitudes 1
        $grafico7 = $this->getGrafico7Data();
        return view('reporteshome.materiales.index', compact('grafico5', 'grafico6', 'grafico7'));
    }

    //REPARACIONES Y MANTENCIONES
    public function ReparacionesMantencionesReport(){
        // gráfico Total de solicitudes 1
        $grafico18 = $this->getGrafico18Data();
        // gráfico Total de solicitudes 1
        $grafico19 = $this->getGrafico19Data();
        // gráfico Total de solicitudes 1
        $grafico20 = $this->getGrafico20Data();
        // gráfico Total de solicitudes 1
        $grafico21 = $this->getGrafico21Data();
        // gráfico Total de solicitudes 1
        $grafico22 = $this->getGrafico22Data();
        // gráfico Total de solicitudes 1
        $grafico23 = $this->getGrafico23Data();
        // gráfico Total de solicitudes 1
        $grafico24 = $this->getGrafico24Data();
        // gráfico Total de solicitudes 1
        $grafico25 = $this->getGrafico25Data();
        return view('reporteshome.reparacionesmantenciones.index', compact('grafico18', 'grafico19', 'grafico20', 'grafico21', 'grafico22', 'grafico23', 'grafico24', 'grafico25'));
    }

    //EQUIPOS
    public function EquiposReport(){
        // gráfico Total de solicitudes 1
        $grafico15 = $this->getGrafico15Data();
        // gráfico Total de solicitudes 1
        $grafico16 = $this->getGrafico16Data();
        // gráfico Total de solicitudes 1
        $grafico17 = $this->getGrafico17Data();
        return view('reporteshome.equipos.index', compact('grafico15', 'grafico16', 'grafico17'));
    }

    //RESERVAS
    public function ReservasReport(){
        // gráfico Total de solicitudes 1
        $grafico11 = $this->getGrafico11Data();
        // gráfico Total de solicitudes 1
        $grafico12 = $this->getGrafico12Data();
        // gráfico Total de solicitudes 1
        $grafico13 = $this->getGrafico13Data();
        return view('reporteshome.reservas.index', compact('grafico11', 'grafico12', 'grafico13'));
    }

    //SISTEMA
    public function SystemReport(){
    // Primer gráfico Total de solicitudes 1
    $grafico = $this->getGraficoData();
    // Segundo gráfico Total de solicitudes 2
    $grafico1 = $this->getGrafico1Data();
    // Tercer gráfico Total de Funcionarios (Hombres/mujeres)
    $grafico2 = $this->getGrafico2Data();
    //TABLA DE CONTINGENCIA
    $regiones = Region::all();
    $ubicaciones = Ubicacion::all();
    $totals = $this->getTotalsPorUbicacion($ubicaciones);
    $direcciones = DireccionRegional::all();
        return view('reporteshome.system.index', compact('grafico', 'grafico1', 'grafico2','ubicaciones', 'regiones','direcciones', 'totals'));
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

    //obtener por fecha para todos los graficos
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
            'grafico15' => $this->getGrafico15Data($fechaInicio, $fechaFin),
            'grafico16' => $this->getGrafico16Data($fechaInicio, $fechaFin),
            'grafico17' => $this->getGrafico17Data($fechaInicio, $fechaFin),
            'grafico18' => $this->getGrafico18Data($fechaInicio, $fechaFin),
            'grafico19' => $this->getGrafico19Data($fechaInicio, $fechaFin),
            'grafico20' => $this->getGrafico20Data($fechaInicio, $fechaFin),
            'grafico21' => $this->getGrafico21Data($fechaInicio, $fechaFin),
            'grafico22' => $this->getGrafico22Data($fechaInicio, $fechaFin),
            'grafico23' => $this->getGrafico23Data($fechaInicio, $fechaFin),
            'grafico24' => $this->getGrafico24Data($fechaInicio, $fechaFin),
            'grafico25' => $this->getGrafico25Data($fechaInicio, $fechaFin),


        ];

        return response()->json($data);
    }

//!! Grafico
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
//!! Grafico 1
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
//!! Grafico 2
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
//!! Grafico 3
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

//!! Grafico 5
public function getGrafico5Data($fechaInicio = null, $fechaFin = null)
{
    // Obtén los roles 'SERVICIOS' y 'ADMINISTRADOR'
    $rolServicios = Role::where('name', 'SERVICIOS')->first();
    $rolAdmin = Role::where('name', 'ADMINISTRADOR')->first();

    // Obtén la colección de usuarios con el rol 'SERVICIOS' o 'ADMINISTRADOR'
    $usuariosServicios = $rolServicios->users->concat($rolAdmin->users)->unique('id');

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


//!! Grafico 7
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

//!! Grafico 8
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
    // Obtén los roles 'SERVICIOS' y 'ADMINISTRADOR'
    $rolServicios = Role::where('name', 'SERVICIOS')->first();
    $rolAdmin = Role::where('name', 'ADMINISTRADOR')->first();

    // Obtén la colección de usuarios con el rol 'SERVICIOS' o 'ADMINISTRADOR'
    $usuariosServicios = $rolServicios->users->concat($rolAdmin->users)->unique('id');

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
    // Obtén el rol 'INFORMATICA'
    // Obtén los roles 'INFORMATICA' y 'ADMINISTRADOR'
    $rolServicios = Role::where('name', 'INFORMATICA')->first();
    $rolAdmin = Role::where('name', 'ADMINISTRADOR')->first();

    // Obtén la colección de usuarios con el rol 'INFORMATICA' o 'ADMINISTRADOR'
    $usuariosServicios = $rolServicios->users->concat($rolAdmin->users)->unique('id');


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

//!! Grafico 15
public function getGrafico15Data($fechaInicio = null, $fechaFin = null){
    $ubicacionUser = Ubicacion::where('ID_UBICACION', auth()->user()->ID_UBICACION)->first();
    $grafico15 = [];

    if($ubicacionUser){
        $direccionFiltrada = DireccionRegional::where('ID_DIRECCION', $ubicacionUser->ID_DIRECCION)->first();
        if($direccionFiltrada){
            $ubicacionesFiltradas = Ubicacion::where('ID_DIRECCION', $direccionFiltrada->ID_DIRECCION)->pluck('ID_UBICACION');
            // Definimos los estados que necesitamos contar
            $estados = ['INGRESADO', 'EN REVISION', 'ACEPTADO', 'RECHAZADO'];

            foreach ($estados as $estado) {
                if ($fechaInicio && $fechaFin) {

                    $conteo = SolicitudEquipos::whereBetween('created_at', [$fechaInicio, $fechaFin])
                                                ->where('ESTADO_SOL_EQUIPO', $estado)
                                                ->count();
                } else {
                    $conteo = SolicitudEquipos::where('ESTADO_SOL_EQUIPO', $estado)
                                                ->count();
                }

                $grafico15[] = [
                    'estado' => $estado,
                    'conteo' => $conteo,
                ];
            }

            return $grafico15;
        } else {
            return ['error' => 'No se pudo encontrar la dirección regional'];
        }
    } else {
        return ['error' => 'No se pudo encontrar la ubicación del usuario'];
    }
}

//!!Grafico 16
public function getGrafico16Data($fechaInicio = null, $fechaFin = null){
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

    $grafico16 = [];

    // Itera sobre cada ubicación
    foreach ($ubicacionesFiltradas as $ubicacion) {
        // Obten todas las solicitudes para esta ubicación
        if($fechaInicio && $fechaFin){
            $solicitudes = SolicitudEquipos::where('DEPTO', $ubicacion->UBICACION)->whereBetween('created_at', [$fechaInicio, $fechaFin])->get();
        }else{
            $solicitudes = SolicitudEquipos::where('DEPTO', $ubicacion->UBICACION)->get();
        }

        // Obten el conteo de solicitudes
        $conteo = $solicitudes->count();

        // Agrega los datos de esta ubicación al array del gráfico
        $grafico16[] = [
            'ubicacion' => $ubicacion->UBICACION,
            'conteo' => $conteo,
            'region' => $ubicacion->direccion->region->REGION
        ];
    }

    return $grafico16;
}

//!!Grafico 17
public function getGrafico17Data($fechaInicio = null, $fechaFin = null){
    // Obtén el rol 'INFORMATICA'
    // Obtén los roles 'INFORMATICA' y 'ADMINISTRADOR'
    $rolServicios = Role::where('name', 'INFORMATICA')->first();
    $rolAdmin = Role::where('name', 'ADMINISTRADOR')->first();

    // Obtén la colección de usuarios con el rol 'INFORMATICA' o 'ADMINISTRADOR'
    $usuariosServicios = $rolServicios->users->concat($rolAdmin->users)->unique('id');


    $grafico17 = [];

    // Iterar sobre los usuarios y realizar el conteo de solicitudes gestionadas
    foreach ($usuariosServicios as $usuario) {
        $nombreCompleto = $usuario->NOMBRES . ' ' . $usuario->APELLIDOS;
        // Realizar consulta para contar las solicitudes gestionadas por el usuario
        try {
            // Realizar consulta para contar las solicitudes gestionadas por el usuario
            if ($fechaInicio && $fechaFin) {
                $conteo = SolicitudSala::where('MODIFICADO_POR_SOL_EQUIPO', $nombreCompleto)->whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
            } else {
                $conteo = SolicitudSala::where('MODIFICADO_POR_SOL_EQUIPO', $nombreCompleto)->count();
            }
        } catch (\Exception $e) {
            // En caso de error, asignar 0 a conteo
            $conteo = 0;
        }
        $grafico17[] = [
            'nombre' => $nombreCompleto,
            'conteo' => $conteo
        ];
    }
    // Devolver los datos para el gráfico de Chart.js
    return $grafico17;
}

//!! Grafico 18
public function getGrafico18Data($fechaInicio = null, $fechaFin = null){
    $solicitudesQuery = SolicitudReparacionVehiculo::whereNotNull('PATENTE_VEHICULO');

    if($fechaInicio && $fechaFin){
        $solicitudesQuery->whereBetween('created_at', [$fechaInicio, $fechaFin]);
    }

    $solicitudes = $solicitudesQuery->get();

    $grafico18 = [];

    // Agrupa las solicitudes por patente y cuenta las filas para cada patente
    $conteosPorPatente = $solicitudes->groupBy('PATENTE_VEHICULO')->map->count();

    // Itera sobre los conteos por patente y crea el array para el gráfico
    foreach ($conteosPorPatente as $patente => $conteo) {
        $grafico18[] = [
            'patente' => $patente,
            'conteo' => $conteo
        ];
    }

    return $grafico18;
}

//!! Grafico 19
public function getGrafico19Data($fechaInicio = null, $fechaFin = null){
    // Obtén los roles 'SERVICIOS' y 'ADMINISTRADOR'
    $rolServicios = Role::where('name', 'SERVICIOS')->first();
    $rolAdmin = Role::where('name', 'ADMINISTRADOR')->first();

    // Obtén la colección de usuarios con el rol 'SERVICIOS' o 'ADMINISTRADOR'
    $usuariosServicios = $rolServicios->users->concat($rolAdmin->users)->unique('id');

    $grafico19 = [];

    // Iterar sobre los usuarios y realizar el conteo de solicitudes gestionadas
    foreach ($usuariosServicios as $usuario) {
        $nombreCompleto = $usuario->NOMBRES . ' ' . trim($usuario->APELLIDOS); // Eliminar espacios adicionales de los apellidos
        // Realizar consulta para contar las solicitudes gestionadas por el usuario
        if ($fechaInicio && $fechaFin) {
            $conteo = SolicitudReparacionVehiculo::where('MODIFICADO_POR_REP_VEH', $nombreCompleto)
                ->whereBetween('created_at', [$fechaInicio, $fechaFin])
                ->count();
        } else {
            $conteo = SolicitudReparacionVehiculo::where('MODIFICADO_POR_REP_VEH', $nombreCompleto)->count();
        }
        $grafico19[] = [
            'nombre' => $nombreCompleto,
            'conteo' => $conteo
        ];
    }
    // Devolver los datos para el gráfico de Chart.js
    return $grafico19;
}



//!! Grafico 20
public function getGrafico20Data($fechaInicio = null, $fechaFin = null){
    $ubicacionUser = Ubicacion::where('ID_UBICACION', auth()->user()->ID_UBICACION)->first();
    $grafico20 = [];

    if($ubicacionUser){
        $direccionFiltrada = DireccionRegional::where('ID_DIRECCION', $ubicacionUser->ID_DIRECCION)->first();
        if($direccionFiltrada){
            $ubicacionesFiltradas = Ubicacion::where('ID_DIRECCION', $direccionFiltrada->ID_DIRECCION)->pluck('ID_UBICACION');
            // Definimos los estados que necesitamos contar
            $estados = ['INGRESADO', 'EN REVISION', 'ACEPTADO', 'RECHAZADO'];

            foreach ($estados as $estado) {
                if ($fechaInicio && $fechaFin) {

                    $conteo = SolicitudReparacionVehiculo::whereBetween('created_at', [$fechaInicio, $fechaFin])
                                                ->where('ESTADO_SOL_REP_VEH', $estado)
                                                ->count();
                } else {
                    $conteo = SolicitudReparacionVehiculo::where('ESTADO_SOL_REP_VEH', $estado)
                                                ->count();
                }

                $grafico20[] = [
                    'estado' => $estado,
                    'conteo' => $conteo,
                ];
            }

            return $grafico20;
        } else {
            return ['error' => 'No se pudo encontrar la dirección regional'];
        }
    } else {
        return ['error' => 'No se pudo encontrar la ubicación del usuario'];
    }
}

//!! Grafico 21
public function getGrafico21Data($fechaInicio = null, $fechaFin = null){
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

    $grafico21 = [];

    // Itera sobre cada ubicación
    foreach ($ubicacionesFiltradas as $ubicacion) {
        // Obten todas las solicitudes para esta ubicación
        if($fechaInicio && $fechaFin){
            $solicitudes = SolicitudReparacionVehiculo::where('DEPTO', $ubicacion->UBICACION)->whereBetween('created_at', [$fechaInicio, $fechaFin])->get();
        }else{
            $solicitudes = SolicitudReparacionVehiculo::where('DEPTO', $ubicacion->UBICACION)->get();
        }

        // Obten el conteo de solicitudes
        $conteo = $solicitudes->count();

        // Agrega los datos de esta ubicación al array del gráfico
        $grafico21[] = [
            'ubicacion' => $ubicacion->UBICACION,
            'conteo' => $conteo,
            'region' => $ubicacion->direccion->region->REGION
        ];
    }

    return $grafico21;
}
//!! Grafico 22
public function getGrafico22Data($fechaInicio = null, $fechaFin = null){
    $query = RelFunRepGeneral::query();

    // Si se proporcionan fechas de inicio y fin, las usamos para filtrar
    if ($fechaInicio && $fechaFin){
        $query->whereBetween('created_at', [$fechaInicio, $fechaFin]);
    }

    $solicitudes = $query->get();

    // Obtener los tipos de reparacion y su conteo
    $conteosPorTipo = $solicitudes->groupBy('ID_TIPO_REP_GENERAL')->map(function ($grouped) {
        return $grouped->count();
    });

    $grafico22 = [];

    foreach ($conteosPorTipo as $idTipoRepGeneral => $conteo) {
        // Usar la relación con TipoReparacion
        $tipoReparacion = TipoReparacion::where('ID_TIPO_REP_GENERAL', $idTipoRepGeneral)->first();
        if ($tipoReparacion) {
            $grafico22[] = [
                'tipo' => $tipoReparacion->TIPO_REP,
                'conteo' => $conteo,
            ];
        }
    }

    return $grafico22;
}
//!! Grafico 23
public function getGrafico23Data($fechaInicio = null, $fechaFin = null){
    // Obtén los roles 'SERVICIOS' y 'ADMINISTRADOR'
    $rolServicios = Role::where('name', 'SERVICIOS')->first();
    $rolAdmin = Role::where('name', 'ADMINISTRADOR')->first();

    // Obtén la colección de usuarios con el rol 'SERVICIOS' o 'ADMINISTRADOR'
    $usuariosServicios = $rolServicios->users->concat($rolAdmin->users)->unique('id');

    $grafico23 = [];

    // Iterar sobre los usuarios y realizar el conteo de solicitudes gestionadas
    foreach ($usuariosServicios as $usuario) {
        $nombreCompleto = $usuario->NOMBRES . ' ' . $usuario->APELLIDOS;
        // Realizar consulta para contar las solicitudes gestionadas por el usuario
        if ($fechaInicio && $fechaFin) {
            $conteo = RelFunRepGeneral::where('MODIFICADO_POR_REP_GEN', $nombreCompleto)->whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
        } else {
            $conteo = RelFunRepGeneral::where('MODIFICADO_POR_REP_GEN', $nombreCompleto)->count();
        }
        $grafico23[] = [
            'nombre' => $nombreCompleto,
            'conteo' => $conteo
        ];
    }
    // Devolver los datos para el gráfico de Chart.js
    return $grafico23;
}
//!! Grafico 24
public function getGrafico24Data($fechaInicio = null, $fechaFin = null){
    $ubicacionUser = Ubicacion::where('ID_UBICACION', auth()->user()->ID_UBICACION)->first();
    $grafico24 = [];

    if($ubicacionUser){
        $direccionFiltrada = DireccionRegional::where('ID_DIRECCION', $ubicacionUser->ID_DIRECCION)->first();
        if($direccionFiltrada){
            $ubicacionesFiltradas = Ubicacion::where('ID_DIRECCION', $direccionFiltrada->ID_DIRECCION)->pluck('ID_UBICACION');
            // Definimos los estados que necesitamos contar
            $estados = ['INGRESADO', 'EN REVISION', 'ACEPTADO', 'RECHAZADO'];

            foreach ($estados as $estado) {
                if ($fechaInicio && $fechaFin) {

                    $conteo = RelFunRepGeneral::whereBetween('created_at', [$fechaInicio, $fechaFin])
                                                ->where('ESTADO_REP_INM', $estado)
                                                ->count();
                } else {
                    $conteo = RelFunRepGeneral::where('ESTADO_REP_INM', $estado)
                                                ->count();
                }

                $grafico24[] = [
                    'estado' => $estado,
                    'conteo' => $conteo,
                ];
            }

            return $grafico24;
        } else {
            return ['error' => 'No se pudo encontrar la dirección regional'];
        }
    } else {
        return ['error' => 'No se pudo encontrar la ubicación del usuario'];
    }
}
//!! Grafico 25
public function getGrafico25Data($fechaInicio = null, $fechaFin = null){
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

    $grafico25 = [];

    // Itera sobre cada ubicación
    foreach ($ubicacionesFiltradas as $ubicacion) {
        // Obten todas las solicitudes para esta ubicación
        if($fechaInicio && $fechaFin){
            $solicitudes = RelFunRepGeneral::where('DEPTO', $ubicacion->UBICACION)->whereBetween('created_at', [$fechaInicio, $fechaFin])->get();
        }else{
            $solicitudes = RelFunRepGeneral::where('DEPTO', $ubicacion->UBICACION)->get();
        }

        // Obten el conteo de solicitudes
        $conteo = $solicitudes->count();

        // Agrega los datos de esta ubicación al array del gráfico
        $grafico25[] = [
            'ubicacion' => $ubicacion->UBICACION,
            'conteo' => $conteo,
            'region' => $ubicacion->direccion->region->REGION
        ];
    }

    return $grafico25;
}

}
