<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudEquipos extends Model
{
    protected $table = 'rel_fun_equipos';
    protected $primaryKey = 'ID_SOL_EQUIPOS';

    protected $fillable = [
        'NOMBRE_SOLICITANTE',
        'RUT',
        'DEPTO',
        'EMAIL',
        'FECHA_ATENCION',
        'ID_USUARIO',
        'TIPO_EQUIPO',
        'MOTIVO_SOL_EQUIPO',
        'EQUIPO_SOL',
        'FECHA_SOL_EQUIPO',
        'HORA_INICIO_SOL_EQUIPO',
        'HORA_TERM_SOL_EQUIPO',
        'FECHA_INICIO_EQUIPO',
        'FECHA_FIN_EQUIPO',
        'ESTADO_SOL_EQUIPO',
        'EQUIPO_A_ASIGNAR',
        'MODIFICADO_POR_SOL_EQUIPO',
        'OBSERV_SOL_EQUIPO',
    ];

    public static $rules = [
        'MOTIVO_SOL_EQUIPO' => 'required|string|max:1000|regex:/^[a-zA-Z0-9\s,]*$/',
        'FECHA_SOL_EQUIPO' => 'required|string|max:128',
        'HORA_INICIO_SOL_EQUIPO' => 'required|string|max:128',
        'HORA_TERM_SOL_EQUIPO' => 'required|string|max:128',
        'FECHA_INICIO_EQUIPO' => 'nullable|date',
        'FECHA_FIN_EQUIPO' => 'nullable|date',
        'ESTADO_SOL_EQUIPO' => 'nullable|string|max:128',
        'MODIFICADO_POR_SOL_EQUIPO' => 'nullable|string|max:128',
        'OBSERV_SOL_EQUIPO' => 'nullable|string|max:1000|regex:/^[a-zA-Z0-9\s]*$/',
        'EQUIPO_SOL' => 'required|string|max:1000|regex:/^[a-zA-Z0-9\s,]*$/',
    ];

    public static $messages = [
        'MOTIVO_SOL_EQUIPO.required' => 'El campo Motivo es obligatorio.',
        'MOTIVO_SOL_EQUIPO.max' => 'El campo Motivo no debe ser mayor a 1000 caracteres.',
        'MOTIVO_SOL_EQUIPO.regex' => 'El campo Motivo no debe contener caracteres especiales.',
        'FECHA_SOL_EQUIPO.required' => 'El campo Fecha es obligatorio.',
        'FECHA_SOL_EQUIPO.max' => 'El campo Fecha no debe ser mayor a 128 caracteres.',
        'HORA_INICIO_SOL_EQUIPO.required' => 'El campo Hora Inicio es obligatorio.',
        'HORA_INICIO_SOL_EQUIPO.max' => 'El campo Hora Inicio no debe ser mayor a 128 caracteres.',
        'HORA_TERM_SOL_EQUIPO.required' => 'El campo Hora Término es obligatorio.',
        'HORA_TERM_SOL_EQUIPO.max' => 'El campo Hora Término no debe ser mayor a 128 caracteres.',
        'FECHA_INICIO_EQUIPO.date' => 'El campo Fecha Inicio debe ser una fecha válida.',
        'FECHA_FIN_EQUIPO.date' => 'El campo Fecha Fin debe ser una fecha válida.',
        'ESTADO_SOL_EQUIPO.max' => 'El campo Estado no debe ser mayor a 128 caracteres.',
        'MODIFICADO_POR_SOL_EQUIPO.max' => 'El campo Modificado Por no debe ser mayor a 128 caracteres.',
        'OBSERV_SOL_EQUIPO.max' => 'El campo Observaciones no debe ser mayor a 1000 caracteres.',
        'OBSERV_SOL_EQUIPO.regex' => 'El campo Observaciones solo puede contener letras y numeros.',
        'EQUIPO_SOL.required' => 'El campo Equipo es obligatorio.',
        'EQUIPO_SOL.max' => 'El campo Equipo no debe ser mayor a 1000 caracteres.',
        'EQUIPO_SOL.regex' => 'El campo Equipo no debe contener caracteres especiales.',
    ];

}
