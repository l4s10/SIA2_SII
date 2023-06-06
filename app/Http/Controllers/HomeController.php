<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//*CARGAR TODOS LOS MODELOS DE SOLICITUDES*/
use App\Models\SolicitudBodegas;
use App\Models\SolicitudSala;
use App\Models\SolicitudEquipos;
use App\Models\SolicitudFormulario;
use App\Models\SolicitudMateriales;
use App\Models\SolicitudReparacionVehiculo;
use App\Models\RelFunRepGeneral;
use App\Models\RelFunVeh;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $all_events = SolicitudSala::where('ESTADO_SOL_SALA', 'ACEPTADO')->get();
        $salas = [];
        foreach($all_events as $event){
            $salas[] = [
                'title' => $event->SALA_A_ASIGNAR. ' (' . $event->NOMBRE_SOLICITANTE.')',
                'start' => $event -> FECHA_INICIO_ASIG_SALA,
                'end' => $event -> FECHA_TERM_ASIG_SALA,
                'color' => '#0064A0'
            ];
        }
        $solBodegas = SolicitudBodegas::where('ESTADO_SOL_BODEGA', 'ACEPTADO')->get();
        $eventoBodegas = [];
        foreach($solBodegas as $solbodega){
            $eventoBodegas[] = [
                'title' => $solbodega -> BODEGA_PEDIDA. ' (' . $event->NOMBRE_SOLICITANTE.')',
                'start' => $solbodega -> FECHA_INICIO_ASIG_BODEGA,
                'end' => $solbodega -> FECHA_TERM_ASIG_BODEGA,
                'color' => '#E6500A'
            ];
        }
        $events = array_merge($salas, $eventoBodegas);
        return view('home.home', compact('events'));
    }
}
