<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudFormulario extends Model
{
    use HasFactory;
    protected $table = 'solicitud_formularios';
    protected $primaryKey = 'ID_SOL_FORM';
    protected $fillable = [
        'NOMBRE_SOLICITANTE',
        'RUT',
        'DEPTO',
        'EMAIL',
        'FORM_SOL',
        'CANT_FORM_SOL',
        'ESTADO_SOL_FORM',
        'OBSERV_SOL_FORM',
        'MODIFICADO_POR_SOL_FORM'
    ];
}
