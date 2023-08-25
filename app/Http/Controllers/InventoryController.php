<?php
// app/Http/Controllers/InventoryController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\MovimientoMaterial;
use App\Models\Material; // Asegúrate de importar el modelo Material si aún no lo has hecho

class InventoryController extends Controller
{
    public function updateStock(Request $request)
    {
        $cantidades_autorizadas = $request->input('cantidad_autorizada');
        $id_sol_material = $request->input('ID_SOLICITUD');  // Asegúrate de enviar este dato desde tu función anterior

        // Procesa cada cantidad autorizada
        foreach ($cantidades_autorizadas as $material_id => $cantidadAutorizada) {
            // Obtén el material actual para determinar el stock previo
            $materialActual = Material::find($material_id);
            $stockPrevio = $materialActual->STOCK; // Asumiendo que tienes un campo llamado STOCK en el modelo Material
            // Actualiza el inventario para el material correspondiente
            $nuevoStock = DB::select('CALL actualizar_stock(?, ?)', [$material_id, $cantidadAutorizada]);
            // Crear el registro de movimiento para cada material actualizado
            MovimientoMaterial::create([
                'ID_MATERIAL' => $material_id,
                'ID_MODIFICANTE' => Auth::user()->id, // Suponiendo que estás usando Auth para obtener el usuario actual
                'TIPO_MOVIMIENTO' => 'SOLICITUD',
                'STOCK_PREVIO' => $stockPrevio,
                'STOCK_NUEVO' => $stockPrevio - $cantidadAutorizada, // Restamos la cantidad solicitada al stock previo
                'DETALLE_MOVIMIENTO' => "AUTORIZADO POR SOLICITUD DE MATERIAL"
            ]);
        }

        // Devuelve la respuesta como un objeto JSON
        return response()->json(['success' => true]);
    }
}
