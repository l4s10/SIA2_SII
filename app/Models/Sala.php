<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;
    protected $table = 'salas';
    protected $primaryKey = 'ID_SALA';
    public $timestamps = false;
    protected $fillable = [
        'NOMBRE_SALA',
        'CAPACIDAD_PERSONAS',
        'ESTADO_SALA',
        'ID_CATEGORIA_SALA'
    ];
    public function categoriaSala()
    {
        return $this->belongsTo(CategoriaSala::class, 'ID_CATEGORIA_SALA');
    }
}
