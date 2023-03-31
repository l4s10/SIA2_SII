<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    use HasFactory;
    protected $table = 'tipo_equipos';
    protected $primaryKey = 'ID_TIPO_EQUIPOS';
    protected $fillable= ['TIPO_EQUIPO'];
    public $timestamps = false;
}
