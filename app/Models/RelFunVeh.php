<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelFunVeh extends Model
{
    use HasFactory;
    protected $table = 'rel_fun_veh';
    protected $primaryKey = 'ID_SOL_VEH';
    //Llenable
    protected $fillable = [
        'ID_SOL_VEH',
        'PATENTE_VEHICULO',
        'ID_USUARIO',
        'MOTIVO_SOL_VEH',
        'CONDUCTOR',
        'FECHA_SALIDA_SOL_VEH',
        'FECHA_LLEGADA_SOL_VEH',
        'HORA_SALIDA_SOL_VEH',
        'HORA_LLEGADA_SOL_VEH',
        'NOMBRE_OCUPANTES',
        'FECHA_CREACION_SOL_VEH',
        'ESTADO_SOL_VEH',
        'FECHA_MODIFICACION_SOL_VEH',
        'MODIFICADO_POR_SOL_VEH',
        'OBSERV_SOL_VEH',
        'ID_TIPO_VEH'
    ];

    public static $rules = [
        'ID_SOL_VEH' => 'required',
        'PATENTE_VEHICULO' => 'required|max:7',
        'ID_USUARIO' => 'nullable|exists:users,id',
        'MOTIVO_SOL_VEH' => 'nullable|max:1000',
        'CONDUCTOR' => 'nullable|max:128',
        'FECHA_SALIDA_SOL_VEH' => 'nullable|date',
        'FECHA_LLEGADA_SOL_VEH' => 'nullable|date',
        'HORA_SALIDA_SOL_VEH' => 'nullable|max:128',
        'HORA_LLEGADA_SOL_VEH' => 'nullable|max:128',
        'NOMBRE_OCUPANTES' => 'nullable|max:1000',
        'FECHA_CREACION_SOL_VEH' => 'nullable|date',
        'ESTADO_SOL_VEH' => 'nullable|max:128',
        'FECHA_MODIFICACION_SOL_VEH' => 'nullable|date',
        'MODIFICADO_POR_SOL_VEH' => 'nullable|max:128',
        'OBSERV_SOL_VEH' => 'nullable|max:1000',
        'ID_TIPO_VEH' => 'required|exists:tipo_vehiculo,ID_TIPO_VEH'
    ];

    public static $messages = [
        'ID_SOL_VEH.required' => 'El campo ID_SOL_VEH es obligatorio.',
        'PATENTE_VEHICULO.required' => 'El campo PATENTE_VEHICULO es obligatorio.',
        'PATENTE_VEHICULO.max' => 'El campo PATENTE_VEHICULO no debe superar los 7 caracteres.',
        'ID_USUARIO.exists' => 'El ID_USUARIO especificado no existe en la tabla users.',
        // Agregar mas mensajes aqui.
    ];
}
