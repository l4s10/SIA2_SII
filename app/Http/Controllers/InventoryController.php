<?php
// app/Http/Controllers/InventoryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function updateStock(Request $request)
    {
        // $materialId = $request->input('materialId');
        // $cantidadRestar = $request->input('cantidadRestar');

        // // Llama a la función almacenada en la base de datos
        // $nuevoStock = DB::select('CALL actualizar_stock(?, ?)', [$materialId, $cantidadRestar]);

        // return response()->json(['nuevoStock' => $nuevoStock]);
        //-----------------------------------------------------------------
        // Recupera el array de cantidades autorizadas
        $cantidades_autorizadas = $request->input('cantidad_autorizada');

        // Procesa cada cantidad autorizada
        foreach ($cantidades_autorizadas as $material_id => $cantidadAutorizada) {
            // Valida y sanitiza los datos aquí
            // ...

            // Actualiza el inventario para el material correspondiente
            $nuevoStock = DB::select('CALL actualizar_stock(?, ?)', [$material_id, $cantidadAutorizada]);
        }

        // Devuelve la respuesta como un objeto JSON
        return response()->json(['success' => true]);
    }
}
