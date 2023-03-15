<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMaterial extends Model
{
    use HasFactory;
    protected $table = 'tipo_material';
    protected $fillable = ['ID_TIPO_MAT', 'TIPO_MATERIAL'];
    // Se cambia el ID predefinico por el nombre del ID de la tabla.
    protected $primaryKey = 'ID_TIPO_MAT';
}
