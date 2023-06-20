<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudBodegas extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_SOL_BODEGA';
    protected $table = 'rel_fun_bodegas';
    protected $fillable = [
        'ID_USUARIO',
        'NOMBRE_SOLICITANTE',
        'RUT',
        'DEPTO',
        'EMAIL',
        'MOTIVO_SOL_BODEGA',
        'FECHA_SOL_BODEGA',
        'FECHA_ASIG_BODEGA',
        'HORA_INICIO_SOL_BODEGA',
        'HORA_TERM_SOL_BODEGA',
        'FECHA_INICIO_ASIG_BODEGA',
        'FECHA_TERM_ASIG_BODEGA',
        'BODEGA_PEDIDA',
        'ESTADO_SOL_BODEGA',
        'MODIFICADO_SOL_BODEGA',
        'OBSERV_SOL_BODEGA',
        'ID_CATEGORIA_SALA',
    ];

    public static $rules = [
        'ID_USUARIO' => 'required|exists:users,id',
        'NOMBRE_SOLICITANTE' => 'required|string|max:128',
        'RUT' => 'required|string|max:20',
        'DEPTO' => 'required|string|max:128',
        'EMAIL' => 'required|email|max:128',
        'MOTIVO_SOL_BODEGA' => 'nullable|string|max:1000',
        'FECHA_SOL_BODEGA' => 'nullable|string',
        'FECHA_INICIO_ASIG_BODEGA' => 'nullable|string',
        'FECHA_TERM_ASIG_BODEGA' => 'nullable|string',
        'HORA_INICIO_SOL_BODEGA' => 'nullable|string|max:128',
        'HORA_TERM_SOL_BODEGA' => 'nullable|string|max:128',
        'BODEGA_PEDIDA' => 'nullable|string|max:128',
        'ESTADO_SOL_BODEGA' => 'nullable|string|max:128',
        'MODIFICADO_POR_SOL_BODEGA' => 'nullable|string|max:128',
        'OBSERV_SOL_BODEGA' => 'nullable|string|max:1000',
        'ID_CATEGORIA_SALA' => 'required|exists:categoria_salas,ID_CATEGORIA_SALA',
    ];

    public static $messages = [
        'ID_USUARIO.required' => 'El ID de usuario es requerido.',
        'ID_USUARIO.exists' => 'El ID de usuario es inválido.',
        'NOMBRE_SOLICITANTE.required' => 'El nombre del solicitante es requerido.',
        'NOMBRE_SOLICITANTE.max' => 'El nombre del solicitante no puede tener más de :max caracteres.',
        'RUT.required' => 'El RUT es requerido.',
        'RUT.max' => 'El RUT no puede tener más de :max caracteres.',
        'DEPTO.required' => 'El departamento es requerido.',
        'DEPTO.max' => 'El departamento no puede tener más de :max caracteres.',
        'EMAIL.required' => 'El email es requerido.',
        'EMAIL.email' => 'El email no es válido.',
        'EMAIL.max' => 'El email no puede tener más de :max caracteres.',
        'MOTIVO_SOL_BODEGA.max' => 'El motivo de la solicitud no puede tener más de :max caracteres.',
        'FECHA_SOL_BODEGA.date' => 'La fecha de solicitud no es válida.',
        'FECHA_ASIG_BODEGA.date' => 'La fecha de asignación no es válida.',
        'HORA_INICIO_SOL_BODEGA.max' => 'La hora de solicitud no puede tener más de :max caracteres.',
        'HORA_TERM_SOL_BODEGA.max' => 'La hora de solicitud no puede tener más de :max caracteres.',
        'HORA_ASIG_BODEGA.max' => 'La hora de asignación no puede tener más de :max caracteres.',
        'BODEGA_PEDIDA.max' => 'La bodega pedida no puede tener más de :max caracteres.',
        'ESTADO_SOL_BODEGA.max' => 'El estado de la solicitud no puede tener más de :max caracteres.',
        'MODIFICADO_POR_SOL_BODEGA.max' => 'El campo Modificado Por no puede tener más de :max caracteres.',
        'OBSERV_SOL_BODEGA.max' => 'La observación de la solicitud no puede tener más de :max caracteres.',
        'ID_CATEGORIA_SALA.required' => 'El ID de categoría de sala es requerido.',
        'ID_CATEGORIA_SALA.exists' => 'El ID de categoría de sala es inválido.',
    ];

    public function categoriaSala()
    {
        return $this->belongsTo(CategoriaSala::class, 'ID_CATEGORIA_SALA');
    }

}
