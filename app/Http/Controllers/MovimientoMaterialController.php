<?php

namespace App\Http\Controllers;

use App\Models\MovimientoMaterial;
use App\Models\Material;

use Illuminate\Http\Request;

class MovimientoMaterialController extends Controller
{
    //DE MOMENTO SOLO EL ADMINISTRADOR PUEDE ENTRAR
    public function __construct(){
        $this->middleware( ['auth', 'checkearRol:ADMINISTRADOR'] );
    }

    public function create()
    {
        $materiales = Material::all();
        return view('movimientosmateriales.create', compact('materiales'));
    }

    public function store(Request $request)
    {
        $material = Material::find($request->ID_MATERIAL);

        // Obteniendo el stock actual del material.
        $stockPrevio = $material->STOCK;

        // Modificamos el request para agregar el STOCK_PREVIO al array de datos
        $data = $request->all();
        $data['STOCK_PREVIO'] = $stockPrevio;

        MovimientoMaterial::create($data);

        // Actualizamos el stock del material
        $material->update(['STOCK' => $request->STOCK_NUEVO]);

        return redirect()->route('materiales.index')->with('success', 'Movimiento creado con éxito.');
    }

}
