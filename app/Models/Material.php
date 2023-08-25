<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $table = 'materiales';
    protected $fillable = ['ID_MATERIAL', 'NOMBRE_MATERIAL', 'ID_TIPO_MAT', 'STOCK', 'ID_DIRECCION'];
    // Se cambia el ID predefinico por el nombre del ID de la tabla.
    protected $primaryKey = 'ID_MATERIAL';

    //* Relacionado con tipos de materiales, para mostrar a cual esta relacionado */
    public function tipoMaterial()
    {
    return $this->belongsTo(TipoMaterial::class, 'ID_TIPO_MAT');
    }

    //!!AHORA COMO ESTA RELACIONADO CON DIRECCIONES REGIONALES, ESTA FUNCION LLAMA AL NOMBRE DE LA DIRECCION
    //*llamala desde las solicitudes con $material->direccionRegional->DIRECCION*/
    public function direccionRegional()
    {
        return $this->belongsTo(DireccionRegional::class, 'ID_DIRECCION');
    }

    //!!Ahora materiales tiene movimientos, por lo que necesitamos crearle el hasMany
    public function movimientos()
    {
        return $this->hasMany(MovimientoMaterial::class, 'ID_MATERIAL');
    }

}
