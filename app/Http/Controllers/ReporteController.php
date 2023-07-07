<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Primer Grafico.
use App\Models\SolicitudSala;
use App\Models\SolicitudBodegas;
use App\Models\SolicitudReparacionVehiculo;
use App\Models\RelFunVeh;
// Segundo Grafico
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
//Exploradores
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


    public function index()
    {
        $grafico1 = [];
        $grafico2 = [];
        $grafico3 = [];

        // Obtener y asignar los valores para el Gráfico 1
        foreach ($this->models1 as $key => $modelClass) {
            $model = new $modelClass;
            $grafico1[$key] = $model->count();
        }

        // Obtener y asignar los valores para el Gráfico 2
        foreach ($this->models2 as $key => $modelClass) {
            $model = new $modelClass;
            $grafico2[$key] = $model->count();
        }

        // Obtener el total de hombres y mujeres
        $totalHombres = User::where('ID_SEXO', '=', '1')->count();
        $totalMujeres = User::where('ID_SEXO', '=', '2')->count();

        // Asignar los valores para el Gráfico 3
        $grafico3 = [
            'totalHombres' => $totalHombres,
            'totalMujeres' => $totalMujeres,
        ];

        //Departamentos
        $ubicaciones = Ubicacion::all();
        //regiones
        $direcciones = DireccionRegional::all();
        // Devolver la vista con los datos
        return view('reportes.index', compact('grafico1', 'grafico2' , 'grafico3', 'ubicaciones', 'direcciones'));
    }

    public function obtenerDatos(Request $request)
    {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        $fechaInicio = Carbon::parse($fechaInicio);
        $fechaFin = Carbon::parse($fechaFin)->endOfDay();

        $data = [
            'grafico1' => $this->getGrafico1Data($fechaInicio, $fechaFin),
            'grafico2' => $this->getGrafico2Data($fechaInicio, $fechaFin),
            'grafico3' => $this->getGrafico3Data($fechaInicio, $fechaFin),
        ];

        return response()->json($data);
    }

    private function getGrafico1Data($fechaInicio = null, $fechaFin = null)
    {
        $grafico1 = [];

        foreach ($this->models1 as $key => $modelClass) {
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

        foreach ($this->models2 as $key => $modelClass) {
            $model = new $modelClass;
            if ($fechaInicio && $fechaFin) {
                $grafico2[$key] = $model->whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
            } else {
                $grafico2[$key] = $model->count();
            }
        }

        return $grafico2;
    }

    private function getGrafico3Data($fechaInicio = null, $fechaFin = null)
    {
        $grafico3 = [];

        $totalHombres = User::where('ID_SEXO', '=', '1');
        $totalMujeres = User::where('ID_SEXO', '=', '2');

        if ($fechaInicio && $fechaFin) {
            $totalHombres->whereBetween('FECHA_INGRESO', [$fechaInicio, $fechaFin]);
            $totalMujeres->whereBetween('FECHA_INGRESO', [$fechaInicio, $fechaFin]);
        }


        $grafico3 = [
            'totalHombres' => $totalHombres->count(),
            'totalMujeres' => $totalMujeres->count(),
        ];

        return $grafico3;
    }
}
