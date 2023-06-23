<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudMateriales;
use App\Models\SolicitudReparacionVehiculo;
use App\Models\SolicitudSala;
use App\Models\SolicitudBodegas;

use Carbon\Carbon;


class ReporteController extends Controller
{
    public function index() {
        //!!GRAFICO 1 (CONTADOR DE SOLICITUDES)
        $Grafico_1 = [
            'solicitudMateriales' => SolicitudMateriales::count(),
            'solicitudReparacionVehiculo' => SolicitudReparacionVehiculo::count(),
            'solicitudSala' => SolicitudSala::count(),
            'solicitudBodegas' => SolicitudBodegas::count()
        ];

        //!!DEVOLVEMOS PAGINA
        return view('reportes.index', compact('Grafico_1'));
    }



    public function obtenerDatos(Request $request)
    {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');


        // Convertir las fechas de entrada a instancias de Carbon
        $fechaInicio = Carbon::parse($fechaInicio);
        $fechaFin = Carbon::parse($fechaFin)->endOfDay();  // endOfDay establece la hora a 23:59:59


        $solicitudMateriales = SolicitudMateriales::whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
        $solicitudReparacionVehiculo = SolicitudReparacionVehiculo::whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
        $solicitudSala = SolicitudSala::whereBetween('created_at', [$fechaInicio, $fechaFin])->count();
        $solicitudBodegas = SolicitudBodegas::whereBetween('created_at', [$fechaInicio, $fechaFin])->count();

        return response()->json([
            'solicitudMateriales' => $solicitudMateriales,
            'solicitudReparacionVehiculo' => $solicitudReparacionVehiculo,
            'solicitudSala' => $solicitudSala,
            'solicitudBodegas' => $solicitudBodegas
        ]);
    }
}
