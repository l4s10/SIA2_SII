<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudSala extends Model
{
    use HasFactory;
    protected $table = 'rel_fun_salas';
    protected $primaryKey = 'ID_SOL_SALA';
    protected $fillable = [
        'ID_USUARIO',
        'NOMBRE_SOLICITANTE',
        'RUT',
        'DEPTO',
        'EMAIL',
        'EQUIPO_SALA',
        'MOTIVO_SOL_SALA',
        'CANT_PERSONAS_SOL_SALAS',
        'FECHA_SOL_SALA',
        'FECHA_ASIG_SALA',
        'HORA_SOL_SALA',
        'HORA_TERM_SOL_SALA',
        'FECHA_INICIO_ASIG_SALA',
        'FECHA_TERM_ASIG_SALA',
        'SALA_PEDIDA',
        'SALA_A_ASIGNAR',
        'ESTADO_SOL_SALA',
        'MODIFICADO_POR_SOL_SALA',
        'OBSERV_SOL_SALA',
        'ID_CATEGORIA_SALA',
        'ID_TIPO_EQUIPOS'
    ];
    public static $rules = [
        'EQUIPO_SALA' => 'nullable|string|max:128',
        'MOTIVO_SOL_SALA' => 'nullable|string|max:1000',
        'CANT_PERSONAS_SOL_SALAS' => 'nullable|integer',
        'FECHA_SOL_SALA' => 'nullable|string',
        'FECHA_INICIO_ASIG_SALA' => 'nullable|string',
        'FECHA_TERM_ASIG_SALA' => 'nullable|string',
        'HORA_SOL_SALA' => 'nullable|string|max:128',
        'HORA_TERM_SOL_SALA' => 'nullable|string',
        'SALA_PEDIDA' => 'nullable|string|max:128',
        'SALA_A_ASIGNAR' => 'nullable|string|max:128',
        'ESTADO_SOL_SALA' => 'nullable|string|max:128',
        'MODIFICADO_POR_SOL_SALA' => 'nullable|string|max:128',
        'OBSERV_SOL_SALA' => 'nullable|string|max:1000',
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
        'EQUIPO_SALA.max' => 'El campo Equipo Sala no puede tener más de :max caracteres.',
        'MOTIVO_SOL_SALA.max' => 'El motivo de la solicitud no puede tener más de :max caracteres.',
        'CANT_PERSONAS_SOL_SALAS.integer' => 'La cantidad de personas debe ser un número entero.',
        'HORA_SOL_SALA.max' => 'La hora de solicitud no puede tener más de :max caracteres.',
        'HORA_ASIG_SOL_SALA.max' => 'La hora de asignación no puede tener más de :max caracteres.',
        'HORA_TERM_ASIG_SALA.max' => 'La hora de asignación no puede tener más de :max caracteres.',
        'SALA_PEDIDA.max' => 'La sala pedida no puede tener más de :max caracteres.',
        'SALA_A_ASIGNAR.max' => 'La sala a asignar no puede tener más de :max caracteres.',
        'ESTADO_SOL_SALA.max' => 'El estado de la solicitud no puede tener más de :max caracteres.',
        'MODIFICADO_POR_SOL_SALA.max' => 'El campo Modificado Por no puede tener más de :max caracteres.',
        'OBSERV_SOL_SALA.max' => 'La observación de la solicitud no puede tener más de :max caracteres.',
    ];



    public function sala()
    {
        return $this->belongsTo(Sala::class, 'ID_SALA');
    }
    public function categoriaSala()
    {
        return $this->belongsTo(CategoriaSala::class, 'ID_CATEGORIA_SALA');
    }
    public function tipoEquipo(){
        return $this->belongsTo(TipoEquipo::class, 'ID_TIPO_EQUIPOS');
    }
}
