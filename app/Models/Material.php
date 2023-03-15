<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = 'materiales';
    protected $fillable = ['ID_MATERIAL','NOMBRE_MATERIAL','ID_TIPO_MAT','STOCK'];
    // Se cambia el ID predefinico por el nombre del ID de la tabla.
    protected $primaryKey = 'ID_MATERIAL';

    public function tipoMaterial()
    {
    return $this->belongsTo(TipoMaterial::class, 'ID_TIPO_MAT');
    }

}
