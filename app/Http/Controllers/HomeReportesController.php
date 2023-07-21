<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeReportesController extends Controller
{
    //DASHBOARD
    public function Home(){
        return view('reporteshome.home');
    }

    //VEHICULOS
    public function VehiculosReport(){
        return view('reporteshome.vehiculos.index');
    }

    //MATERIALES
    public function MaterialsReport(){
        return view('reporteshome.materiales.index');
    }

    //REPARACIONES Y MANTENCIONES
    public function ReparacionesMantencionesReport(){
        return view('reporteshome.reparacionesmantenciones.index');
    }

    //EQUIPOS
    public function EquiposReport(){
        return view('reporteshome.equipos.index');
    }

    //RESERVAS
    public function ReservasReport(){
        return view('reporteshome.reservas.index');
    }

    //SISTEMA
    public function SystemReport(){
        return view('reporteshome.system.index');
    }
}