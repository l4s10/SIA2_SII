<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudSala extends Model
{
    use HasFactory;
    protected $table = 'solicitud_salas';
    protected $primaryKey = 'ID_SOL_SALA';
    protected $fillable = [
        'NOMBRE_SOLICITANTE',
        'RUT',
        'DEPTO',
        'EMAIL',
        'EQUIPO_SALA',
        'MOTIVO_SOL_SALA',
        'CANT_PERSONAS_SOL_SALAS',
        'FECHA_SOL_SALA',
        'HORA_INICIO_SOL_SALA',
        'HORA_TERM_SOL_SALA',
        'SALA_A_ASIGNAR',
        'ESTADO_SOL_SALA',
        'MODIFICADO_POR_SOL_SALA',
        'OBSERV_SOL_SALA',
        'ID_CATEGORIA_SALA',
        'ID_TIPO_EQUIPOS'
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
