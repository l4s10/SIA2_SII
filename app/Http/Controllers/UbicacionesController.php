<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicacion;

class UbicacionesController extends Controller
{
    public function getUbicaciones($direccionId)
    {
        // Asume que tienes un modelo Ubicacion que tiene una relación con Direcciones
        $ubicaciones = Ubicacion::where('ID_DIRECCION', $direccionId)->get();

        return response()->json($ubicaciones);
    }
}
