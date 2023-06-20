<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//*CARGAR TODOS LOS MODELOS DE SOLICITUDES*/
use App\Models\SolicitudBodegas;
use App\Models\SolicitudSala;
use App\Models\SolicitudReparacionVehiculo;
use App\Models\RelFunVeh;

class GraficoController extends Controller
{
    public function obtenerDatosGrafico()
    {
        // Obtener los datos para el gráfico desde tu modelo o fuente de datos
        $solicitudes  = SolicitudSala::all();
        
        // Contar el número de solicitudes por categoría
        $salas = $solicitudes->count();
        $bodegas = $solicitudes->where('categoria', 'Bodegas')->count();
        $reparacionVehiculos = $solicitudes->where('categoria', 'Reparación de Vehículos')->count();
        $reservaVehiculos = $solicitudes->where('categoria', 'Reserva de Vehículos')->count();
        
        // Construir el arreglo de datos para el gráfico
        $data = [
            'labels' => ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
            'datasets' => [
                [
                    'data' => [$salas, $bodegas, $reparacionVehiculos, $reservaVehiculos],
                    'backgroundColor' => [
                        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
                        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
                        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
                        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
                    ],
                    'borderWidth' => 1
                ]
            ]
        ];
        
        return response()->json($data);
    }
}