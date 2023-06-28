<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudSala;
use App\Models\SolicitudBodegas;
use App\Models\SolicitudReparacionVehiculo;
use App\Models\RelFunVeh;
use App\Models\Sexo;
use Carbon\Carbon;

class ReporteController extends Controller
{
    // Define los modelos en un array
    private $models = [
        'solicitudSala' => SolicitudSala::class,
        'solicitudBodegas' => SolicitudBodegas::class,
        'solicitudReparacionVehiculo' => SolicitudReparacionVehiculo::class,
        'relFunVeh' => RelFunVeh::class
    ];

    // private $models = [
    //      'sexos' = Sexo::class,
    // ];

    public function index()
    {
        $Grafico_1 = [];
        // Obtener y asignar los valores para el Grafico_1
        //Grafico 1 = Tipo de solicitud mas pedido.
        // Itera a través de los modelos y guarda el recuento
        foreach ($this->models as $key => $model) {
            $Grafico_1[$key] = $model::count();
        }
        // Devolver la vista con los datos
        return view('reportes.index', compact('Grafico_1'));
    }

    public function obtenerDatos(Request $request)
    {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        // Convertir las fechas de entrada a instancias de Carbon
        $fechaInicio = Carbon::parse($fechaInicio);
        $fechaFin = Carbon::parse($fechaFin)->endOfDay();

        $data = [
            'grafico1' => []
        ];

        // Itera a través de los modelos y guarda el recuento entre fechas
        foreach ($this->models as $key => $model) {
            $data['grafico1'][$key] = $model::whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
        }
        // Obtener el recuento de registros para cada modelo y devolver en JSON
        return response()->json($data);
    }
}
