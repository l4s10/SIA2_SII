<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientoMaterial extends Model
{
    use HasFactory;

    protected $table = 'rel_mat_mov';

    protected $fillable = [
        'ID_MATERIAL', 'ID_MODIFICANTE', 'TIPO_MOVIMIENTO',
        'STOCK_PREVIO', 'STOCK_NUEVO', 'FECHA_PROGRAMADA', 'DETALLE_MOVIMIENTO'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class, 'ID_MATERIAL');
    }

}
