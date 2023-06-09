<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//*CARGAR TODOS LOS MODELOS DE SOLICITUDES*/
use App\Models\SolicitudBodegas;
use App\Models\SolicitudSala;
use App\Models\SolicitudReparacionVehiculo;
use App\Models\RelFunVeh;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $all_events = SolicitudSala::where('ESTADO_SOL_SALA', 'ACEPTADO')->get();
        $salas = [];
        foreach ($all_events as $event) {
            $salas[] = [
                'title' => $event->SALA_A_ASIGNAR,
                'start' => $event->FECHA_INICIO_ASIG_SALA,
                'end' => $event->FECHA_TERM_ASIG_SALA,
                'color' => '#0064A0',
                'departamento' => $event->DEPTO,
                'nombreSolicitante' => $event->NOMBRE_SOLICITANTE,
                'tipoEvento' => 'Reserva de sala'
            ];
        }

        $solBodegas = SolicitudBodegas::where('ESTADO_SOL_BODEGA', 'ACEPTADO')->get();
        $eventoBodegas = [];
        foreach ($solBodegas as $solbodega) {
            $eventoBodegas[] = [
                'title' => $solbodega->BODEGA_PEDIDA,
                'start' => $solbodega->FECHA_INICIO_ASIG_BODEGA,
                'end' => $solbodega->FECHA_TERM_ASIG_BODEGA,
                'color' => '#E6500A',
                'departamento' => $solbodega->DEPTO,
                'nombreSolicitante' => $solbodega->NOMBRE_SOLICITANTE,
                'tipoEvento' => 'Reserva de bodega'
            ];
        }

        $reparacionesVeh = SolicitudReparacionVehiculo::where('ESTADO_SOL_REP_VEH','ACEPTADO')->get();
        $eventoVeh = [];
        //*PARSEAMOS A EVENTO DE FULLCALENDAR*/
        foreach($reparacionesVeh as $reparacion){
            $eventoVeh[] = [
                'title' => $reparacion->PATENTE_VEHICULO,
                'start' => $reparacion->FECHA_INICIO_REP_VEH,
                'end' => $reparacion->FECHA_TERMINO_REP_VEH,
                'color' => '#d9d9d9',
                'departamento' => $reparacion->DEPTO,
                'nombreSolicitante' => $reparacion->NOMBRE_SOLICITANTE,
                'tipoEvento' => 'Reparacion vehicular'
            ];
        }

        $solVeh = RelFunVeh::where('ESTADO_SOL_VEH','ACEPTADO')->get();
        $eventoSolVeh = [];
        //**PARSEAMOS A EVENTO FULLCALENDAR */
        foreach($solVeh as $solicitudVeh){
            $eventoSolVeh[] = [
                'title' => $solicitudVeh->PATENTE_VEHICULO,
                'start' => $solicitudVeh->FECHA_SALIDA,
                'end' => $solicitudVeh->FECHA_LLEGADA,
                'color' => '#696969',
                'departamento' => $solicitudVeh->DEPTO,
                'nombreSolicitante' => $solicitudVeh->NOMBRE_SOLICITANTE,
                'tipoEvento' => 'Reserva de vehiculo'
            ];
        }
        //*CONCATENAMOS TODOS LOS EVENTOS EN UN ARRAY DE EVENTOS.
        $events = array_merge($salas, $eventoBodegas, $eventoVeh, $eventoSolVeh);
        return view('home.home', compact('events'));
    }
}
