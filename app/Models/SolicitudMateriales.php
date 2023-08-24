<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function diasDeTramitacion()
    {
        if ($this->FECHA_DESPACHO) {
            $fechaInicio = new Carbon($this->created_at); // Usando el timestamp de creación
            $fechaFin = new Carbon($this->FECHA_DESPACHO);
            return $fechaInicio->diffInDays($fechaFin);
        } else {
            // La solicitud aún está en proceso, manejar como prefieras
            return null;
        }
    }
}
