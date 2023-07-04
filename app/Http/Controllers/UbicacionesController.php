<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ubicacion;

class UbicacionesController extends Controller
{
    public function getUbicaciones($id)
    {
        $ubicaciones = Ubicacion::where("ID_DIRECCION", $id)->pluck("UBICACION","ID_UBICACION");

        return json_encode($ubicaciones);
    }
}
