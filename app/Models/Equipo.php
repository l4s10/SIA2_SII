<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $table = 'equipos';
    protected $primaryKey = 'ID_EQUIPO';
    protected $fillable = [
        'MARCA_EQUIPO',
        'MODELO_EQUIPO',
        'ESTADO_EQUIPO',
        'ID_TIPO_EQUIPOS'
    ];
    public $timestamps = false;
    public function tipoEquipo()
    {
        return $this->belongsTo(TipoEquipo::class, 'ID_TIPO_EQUIPOS');
    }
}
