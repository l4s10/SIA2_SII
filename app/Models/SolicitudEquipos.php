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
        'NOMBRE_SOLICITANTE' => 'required|string|max:128',
        'RUT' => 'required|string|max:20',
        'DEPTO' => 'required|string|max:128',
        'EMAIL' => 'required|string|email|max:128',
        'ID_USUARIO' => 'nullable|integer|exists:users,id',
        'TIPO_EQUIPO' => 'nullable|string|max:128',
        'MOTIVO_SOL_EQUIPO' => 'nullable|string|max:1000',
        'EQUIPO_SOL' => 'nullable|string|max:1000',
        'FECHA_SOL_EQUIPO' => 'nullable|string|max:128',
        'HORA_INICIO_SOL_EQUIPO' => 'nullable|string|max:128',
        'HORA_TERM_SOL_EQUIPO' => 'nullable|string|max:128',
        'FECHA_INICIO_EQUIPO' => 'nullable|date',
        'FECHA_FIN_EQUIPO' => 'nullable|date',
        'ESTADO_SOL_EQUIPO' => 'nullable|string|max:128',
        'EQUIPO_A_ASIGNAR' => 'nullable|string|max:1000',
        'MODIFICADO_POR_SOL_EQUIPO' => 'nullable|string|max:128',
        'OBSERV_SOL_EQUIPO' => 'nullable|string|max:1000',
    ];

    public static $messages = [
        'NOMBRE_SOLICITANTE.required' => 'El campo Nombre del Solicitante es requerido.',
        'NOMBRE_SOLICITANTE.max' => 'El campo Nombre del Solicitante no puede exceder los 128 caracteres.',
        'RUT.required' => 'El campo RUT es requerido.',
        'RUT.max' => 'El campo RUT no puede exceder los 20 caracteres.',
        'DEPTO.required' => 'El campo Departamento es requerido.',
        'DEPTO.max' => 'El campo Departamento no puede exceder los 128 caracteres.',
        'EMAIL.required' => 'El campo Email es requerido.',
        'EMAIL.email' => 'El campo Email debe ser una dirección de correo electrónico válida.',
        'EMAIL.max' => 'El campo Email no puede exceder los 128 caracteres.',
        'ID_USUARIO.integer' => 'El campo ID Usuario debe ser un número entero.',
        'ID_USUARIO.exists' => 'El ID de usuario proporcionado no existe.',
        'TIPO_EQUIPO.max' => 'El campo Tipo de Equipo no puede exceder los 128 caracteres.',
        'MOTIVO_SOL_EQUIPO.max' => 'El campo Motivo de la Solicitud de Equipo no puede exceder los 1000 caracteres.',
        'EQUIPO_SOL.max' => 'El campo Equipo Solicitud no puede exceder los 1000 caracteres.',
        'FECHA_SOL_EQUIPO.string' => 'El campo Fecha de Solicitud de Equipo debe ser una fecha válida.',
        'HORA_INICIO_SOL_EQUIPO.max' => 'El campo Hora de Inicio de Solicitud de Equipo no puede exceder los 128 caracteres.',
        'HORA_TERM_SOL_EQUIPO.max' => 'El campo Hora de Término de Solicitud de Equipo no puede exceder los 128 caracteres.',
        'FECHA_INICIO_EQUIPO.date' => 'El campo Fecha de Inicio de Equipo debe ser una fecha válida.',
        'FECHA_FIN_EQUIPO.date' => 'El campo Fecha de Fin de Equipo debe ser una fecha válida.',
        'ESTADO_SOL_EQUIPO.max' => 'El campo Estado de Solicitud de Equipo no puede exceder los 128 caracteres.',
        'EQUIPO_A_ASIGNAR.max' => 'El campo Equipo a Asignar no puede exceder los 1000 caracteres.',
        'MODIFICADO_POR_SOL_EQUIPO.max' => 'El campo Modificado por Solicitud de Equipo no puede exceder los 128 caracteres.',
        'OBSERV_SOL_EQUIPO.string' => 'El campo Observaciones de Solicitud de Equipo debe ser una cadena de texto.',
        'OBSERV_SOL_EQUIPO.max' => 'El campo Observaciones de Solicitud de Equipo no puede exceder los 1000 caracteres.',
    ];

}
