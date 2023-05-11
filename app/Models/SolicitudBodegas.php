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
        'HORA_SOL_BODEGA',
        'HORA_ASIG_BODEGA',
        'BODEGA_PEDIDA',
        'ESTADO_SOL_BODEGA',
        'MODIFICADO_SOL_BODEGA',
        'OBSERV_SOL_BODEGA',
        'ID_CATEGORIA_SALA',
    ];
}
