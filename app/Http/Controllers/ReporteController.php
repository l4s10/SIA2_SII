<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudSala;
use App\Models\SolicitudBodegas;
use App\Models\SolicitudReparacionVehiculo;
use App\Models\RelFunVeh;
use Carbon\Carbon;

class ReporteController extends Controller
{
    public function index()
    {
        // Obtener los valores para el Grafico_1
        $solicitudSala = SolicitudSala::count();
        $solicitudBodegas = SolicitudBodegas::count();
        $solicitudReparacionVehiculo = SolicitudReparacionVehiculo::count();
        $relFunVeh = RelFunVeh::count();

        // Asignar los valores al arreglo Grafico_1
        $Grafico_1 = [
            $solicitudSala,
            $solicitudBodegas,
            $solicitudReparacionVehiculo,
            $relFunVeh
        ];

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

        // Obtener el recuento de registros para cada modelo
        $solicitudSala = SolicitudSala::whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
        $solicitudBodegas = SolicitudBodegas::whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
        $solicitudReparacionVehiculo = SolicitudReparacionVehiculo::whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
        $relFunVeh = RelFunVeh::whereBetween('created_at', [$fechaInicio, $fechaFin])->count();

        return response()->json([
            'solicitudSala' => $solicitudSala,
            'solicitudBodegas' => $solicitudBodegas,
            'solicitudReparacionVehiculo' => $solicitudReparacionVehiculo,
            'relFunVeh' => $relFunVeh
        ]);
    }
}
