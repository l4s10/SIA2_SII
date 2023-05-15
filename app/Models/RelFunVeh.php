<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelFunVeh extends Model
{
    use HasFactory;
    protected $table = 'rel_fun_veh';
    protected $primaryKey = 'ID_SOL_VEH';

    protected $fillable = [
        'PATENTE_VEHICULO',
        'ID_USUARIO',
        'NOMBRE_SOLICITANTE',
        'RUT',
        'DEPTO',
        'EMAIL',
        'MOTIVO_SOL_VEH',
        'CONDUCTOR',
        'FECHA_SALIDA_SOL_VEH',
        'FECHA_LLEGADA_SOL_VEH',
        'HORA_SALIDA_SOL_VEH',
        'HORA_LLEGADA_SOL_VEH',
        'NOMBRE_OCUPANTES',
        'ESTADO_SOL_VEH',
        'MODIFICADO_POR_SOL_VEH',
        'OBSERV_SOL_VEH',
        'ID_TIPO_VEH'
    ];

    public static function rules()
    {
        return [
            'PATENTE_VEHICULO' => 'nullable|string|max:7',
            'ID_USUARIO' => 'nullable|integer|exists:users,id',
            'NOMBRE_SOLICITANTE' => 'required|string|max:128',
            'RUT' => 'required|string|max:20',
            'DEPTO' => 'required|string|max:128',
            'EMAIL' => 'required|string|max:128|email',
            'MOTIVO_SOL_VEH' => 'nullable|string|max:1000',
            'CONDUCTOR' => 'nullable|string|max:128',
            'FECHA_SALIDA_SOL_VEH' => 'nullable|string',
            'FECHA_LLEGADA_SOL_VEH' => 'nullable|string',
            'HORA_SALIDA_SOL_VEH' => 'nullable|string|max:128',
            'HORA_LLEGADA_SOL_VEH' => 'nullable|string|max:128',
            'NOMBRE_OCUPANTES' => 'nullable|string|max:1000',
            'ESTADO_SOL_VEH' => 'nullable|string|max:128',
            'MODIFICADO_POR_SOL_VEH' => 'nullable|string|max:128',
            'OBSERV_SOL_VEH' => 'nullable|string|max:1000',
            'ID_TIPO_VEH' => 'required|integer|exists:tipo_vehiculo,ID_TIPO_VEH'
        ];
    }

    public static function messages()
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'max' => 'El campo :attribute no debe exceder los :max caracteres.',
            'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
            'exists' => 'El valor seleccionado para :attribute no es válido.'
        ];
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'ID_USUARIO');
    }

    public function tipoVehiculo()
    {
        return $this->belongsTo(TipoVehiculo::class, 'ID_TIPO_VEH');
    }

}
