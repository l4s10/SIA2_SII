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
        'OCUPANTE_1',
        'OCUPANTE_2',
        'OCUPANTE_3',
        'OCUPANTE_4',
        'OCUPANTE_5',
        'OCUPANTE_6',
        'ORIGEN',
        'DESTINO',
        'N_ORDEN_TRABAJO',
        'KMS_INICIAL',
        'KMS_FINAL',
        'KMS_RECORRIDOS',
        'HORA_SALIDA',
        'HORA_LLEGADA',
        'HORAS_TOTALES',
        'NIVEL_TANQUE',
        'N_BITACORA',
        'ABS_BENCINA',
        'FECHA_SOL_VEH',
        'FECHA_SALIDA',
        'FECHA_LLEGADA',
        'FECHA_LLEGADA_CONDUCTOR',
        'NOMBRE_OCUPANTES',
        'ESTADO_SOL_VEH',
        'MODIFICADO_POR_SOL_VEH',
        'OBSERV_SOL_VEH',
        'ID_TIPO_VEH',
    ];

    public static $rules = [
        'PATENTE_VEHICULO' => 'nullable|string|max:7',
        'ID_USUARIO' => 'nullable|integer',
        'NOMBRE_SOLICITANTE' => 'required|string|max:128',
        'RUT' => 'required|string|max:20',
        'DEPTO' => 'required|string|max:128',
        'EMAIL' => 'required|string|email|max:128',
        'MOTIVO_SOL_VEH' => 'nullable|string|max:1000',
        'CONDUCTOR' => 'nullable|string|max:128',
        'OCUPANTE_1' => 'nullable|string|max:128',
        'OCUPANTE_2' => 'nullable|string|max:128',
        'OCUPANTE_3' => 'nullable|string|max:128',
        'OCUPANTE_4' => 'nullable|string|max:128',
        'OCUPANTE_5' => 'nullable|string|max:128',
        'OCUPANTE_6' => 'nullable|string|max:128',
        'ORIGEN' => 'nullable|string|max:128',
        'DESTINO' => 'nullable|string|max:128',
        'N_ORDEN_TRABAJO' => 'nullable|integer',
        'FIRMA_CONDUCTOR' => 'nullable|string|max:128',
        'FIRMA_JEFE_ADMINISTRACION' => 'nullable|string|max:128',
        'FIRMA_ADMINISTRADOR' => 'nullable|string|max:128',
        'KMS_INICIAL' => 'nullable|string|max:128',
        'KMS_FINAL' => 'nullable|string|max:128',
        'KMS_RECORRIDOS' => 'nullable|string|max:128',
        'HORAS_TOTALES' => 'nullable|string|max:128',
        'NIVEL_TANQUE' => 'nullable|string|max:128',
        'N_BITACORA' => 'nullable|integer',
        'ABS_BENCINA' => 'nullable|string|max:128',
        'FECHA_SALIDA' => 'nullable|date',
        'FECHA_LLEGADA' => 'nullable|date',
        'FECHA_LLEGADA_CONDUCTOR' => 'nullable|date',
        'NOMBRE_OCUPANTES' => 'nullable|string|max:1000',
        'ESTADO_SOL_VEH' => 'nullable|string|max:128',
        'MODIFICADO_POR_SOL_VEH' => 'nullable|string|max:128',
        'OBSERV_SOL_VEH' => 'nullable|string|max:1000',
        'ID_TIPO_VEH' => 'required|integer',
    ];

    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'integer' => 'El campo :attribute debe ser un número entero.',
        'string' => 'El campo :attribute debe ser una cadena de texto.',
        'max' => 'El campo :attribute no debe exceder :max caracteres.',
        'email' => 'El campo :attribute debe ser una dirección de correo válida.',
        'date' => 'El campo :attribute debe ser una fecha válida.',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'ID_USUARIO');
    }

    public function conductor()
    {
        return $this->belongsTo(User::class, 'CONDUCTOR');
    }

    public function comunaOrigen()
    {
        return $this->belongsTo(Comuna::class, 'ORIGEN');
    }

    public function comunaDestino()
    {
        return $this->belongsTo(Comuna::class, 'DESTINO');
    }

    public function tipoVehiculo()
    {
        return $this->belongsTo(TipoVehiculo::class, 'ID_TIPO_VEH');
    }

}
