<?php

namespace App\Http\Controllers;
use App\Models\SolicitudSala;
use App\Models\SolicitudReparacionVehiculo;
use App\Models\RelFunVeh;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index(){
        $cantidadSalas = SolicitudSala::count();
        $cantidadSolRepVeh = SolicitudReparacionVehiculo::count();
        return view('reportes.index', compact('cantidadSalas','cantidadSolRepVeh'));
    }
}
