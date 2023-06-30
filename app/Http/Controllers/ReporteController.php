<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Primer Grafico
use App\Models\SolicitudSala;
use App\Models\SolicitudBodegas;
use App\Models\SolicitudReparacionVehiculo;
use App\Models\RelFunVeh;
// Segundo Grafico 
use App\Models\RelFunRepGeneral;
use App\Models\SolicitudEquipos;
use App\Models\SolicitudFormulario;
use App\Models\SolicitudMateriales;
// Tercer Grafico
use App\Models\User;
use App\Models\Sexo;
use Carbon\Carbon;

class ReporteController extends Controller
{
    // Define los modelos para el primer gráfico
    private $models1 = [
        'solicitudSala' => SolicitudSala::class,
        'solicitudBodegas' => SolicitudBodegas::class,
        'solicitudReparacionVehiculo' => SolicitudReparacionVehiculo::class,
        'relFunVeh' => RelFunVeh::class,
    ];

    // Define los modelos para el segundo gráfico
    private $models2 = [
        'solicitudMateriales' => SolicitudMateriales::class,
        'relFunRepGeneral' => RelFunRepGeneral::class,
        'solicitudFormularios' => SolicitudFormulario::class,
        'solicitudEquipos' => SolicitudEquipos::class,
    ];

    private $models3 = [
        //aqui iria el apartado de sexo para leer el total de hombres y mujeres
        'sexo' => Sexo::class,
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
        // Devolver la vista con los datos
        return view('reportes.index', compact('grafico1', 'grafico2' , 'grafico3'));
    }

    public function obtenerDatos(Request $request)
    {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        // Convertir las fechas de entrada a instancias de Carbon
        $fechaInicio = Carbon::parse($fechaInicio);
        $fechaFin = Carbon::parse($fechaFin)->endOfDay();

        $data = [
            'grafico1' => [],
            'grafico2' => [],
            'grafico3' => []
        ];

        // Iterar a través de los modelos y guardar el recuento entre fechas para el Gráfico 1
        foreach ($this->models1 as $key => $modelClass) {
            $model = new $modelClass;
            $data['grafico1'][$key] = $model->whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
        }

        // Obtener el recuento de registros para cada modelo y el Gráfico 2
        foreach ($this->models2 as $key => $modelClass) {
            $model = new $modelClass;
            $data['grafico2'][$key] = $model->whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
        }

        // Obtener el recuento de registros para cada modelo y devolver en JSON
        return response()->json($data);
    }
}