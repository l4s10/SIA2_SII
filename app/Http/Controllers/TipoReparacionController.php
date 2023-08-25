<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TipoReparacion;

class TipoReparacionController extends Controller
{
    //
    public function getTipos(){
        return TipoReparacion::all();
    }
}
