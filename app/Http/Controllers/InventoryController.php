<?php
// app/Http/Controllers/InventoryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function updateStock(Request $request)
    {
        $materialId = $request->input('materialId');
        $cantidadRestar = $request->input('cantidadRestar');

        // Llama a la función almacenada en la base de datos
        $nuevoStock = DB::select('CALL actualizar_stock(?, ?)', [$materialId, $cantidadRestar]);

        return response()->json(['nuevoStock' => $nuevoStock]);
    }
}
