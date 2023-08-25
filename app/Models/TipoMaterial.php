<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMaterial extends Model
{
    use HasFactory;
    protected $table = 'tipo_material';
    protected $fillable = ['ID_TIPO_MAT', 'TIPO_MATERIAL', 'ID_DIRECCION'];
    // Se cambia el ID predefinico por el nombre del ID de la tabla.
    protected $primaryKey = 'ID_TIPO_MAT';

    //!!AHORA COMO ESTA RELACIONADO CON DIRECCIONES REGIONALES, ESTA FUNCION LLAMA AL NOMBRE DE LA DIRECCION
    //*llamala desde las solicitudes con $tipoMaterial->direccionRegional->DIRECCION*/
    public function direccionRegional()
    {
        return $this->belongsTo(DireccionRegional::class, 'ID_DIRECCION');
    }
}
