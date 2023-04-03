<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudEquipos extends Model
{
    use HasFactory;

    protected $table = 'solicitud_equipos';

    protected $primaryKey = 'ID_SOL_EQUIPOS';

    protected $fillable = [
        'NOMBRE_SOLICITANTE',
        'RUT',
        'DEPTO',
        'EMAIL',
        'ID_USUARIO',
        'TIPO_EQUIPO',
        'MOTIVO_SOL_EQUIPO',
        'FECHA_SOL_EQUIPO',
        'HORA_INICIO_SOL_EQUIPO',
        'HORA_TERM_SOL_EQUIPO',
        'ESTADO_SOL_EQUIPO',
        'EQUIPO_A_ASIGNAR',
        'MODIFICADO_POR_SOL_EQUIPO',
        'OBSERV_SOL_EQUIPO',
        'ID_TIPO_EQUIPOS'
    ];

    public function tipoEquipo()
    {
        return $this->belongsTo(TipoEquipo::class, 'ID_TIPO_EQUIPOS');
    }
}
