<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'PATENTE_VEHICULO',
        'TIPO_VEHICULO',
        'MARCA',
        'MODELO_VEHICULO',
        'ANO_VEHICULO',
        'UNIDAD_VEHICULO',
        'ESTADO_VEHICULO',
    ];
    // Cambiamos el valor por defecto de id al nombre que tenga en la base de datos
    protected $primaryKey = 'PATENTE_VEHICULO';
    //Si nuestra llave primaria NO ES NUMERICO y es STRING, debemos cambiar el valor de $keytype...
    protected $keyType = 'string';
}