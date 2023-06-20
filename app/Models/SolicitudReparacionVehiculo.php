<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudReparacionVehiculo extends Model
{
    use HasFactory;
    protected $table = 'rel_fun_rep_veh';
    protected $primaryKey = 'ID_SOL_REP_VEH';
    protected $fillable= [
        'ID_USUARIO',
        'NOMBRE_SOLICITANTE',
        'RUT',
        'DEPTO',
        'EMAIL',
        'PATENTE_VEHICULO',
        'ID_TIPO_SERVICIO',
        'DETALLE_REPARACION_REP_VEH',
        'FECHA_INICIO_REP_VEH',
        'FECHA_TERMINO_REP_VEH',
        'ESTADO_SOL_REP_VEH',
        'MODIFICADO_POR_REP_VEH',
        'OBSERV_REP_VEH'
    ];
    public $timestamps = true;

    //Funciones para devolver los nombres y tipos de servicio a traves de las ID.
    public function tipoVehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'ID_TIPO_VEH');
    }

    public function tipoServicio()
    {
        return $this->belongsTo(TipoServicio::class, 'ID_TIPO_SERVICIO');
    }
}
