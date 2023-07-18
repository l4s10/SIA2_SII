<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelFunRepGeneral extends Model
{
    use HasFactory;
    //Definimos la tabla
    protected $table = 'rel_fun_rep_general';
    protected $primaryKey = 'ID_REP_INM';
    protected $fillable = [
        'ID_USUARIO',
        'TIPO_REPARACION_REP_GEN',
        'NOMBRE_SOLICITANTE',
        'RUT',
        'DEPTO',
        'EMAIL',
        'REP_SOL',
        'ESTADO_REP_INM',
        'OBSERV_REP_INM',
        'MODIFICADO_POR_REP_GEN',
        'ID_TIPO_REP_GENERAL'
    ];

    public function tipo_reparacion(){
        return $this->belongsTo(TipoReparacion::class, 'ID_TIPO_REP_GENERAL');
    }
}
