<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Material;

class StockController extends Controller
{
    public function actualizarStockGeneral(Request $request)
    {
        $actualizacionesStock = $request->input('actualizacionesStock');
        $stockActualizado = [];

        foreach ($actualizacionesStock as $actualizacion) {
            $producto_id = $actualizacion['producto_id'];
            $cantidad = $actualizacion['cantidad'];

            // Llamar al procedimiento almacenado
            DB::unprepared("CALL actualizar_stock(?, ?)", [$producto_id, $cantidad]);

            // Obtener el stock actualizado
            $material = Material::find($producto_id);
            $stockNuevo = $material->STOCK;

            $stockActualizado[] = [
                'producto_id' => $producto_id,
                'stockNuevo' => $stockNuevo,
            ];
        }

        return response()->json([
            'stockActualizado' => $stockActualizado,
        ]);
    }
}
