<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudMateriales extends Model
{
    use HasFactory;
    protected $primaryKey= 'ID_SOLICITUD';
    protected $table='rel_fun_mat';
    protected $fillable= [
        'ID_USUARIO',
        'NOMBRE_SOLICITANTE',
        'RUT',
        'DEPTO',
        'EMAIL',
        'MATERIAL_SOL',
        'FECHA_DESPACHO',
        'OBSERVACIONES',
        'ESTADO_SOL',
        'MODIFICADO_POR'
    ];
}
