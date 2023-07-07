<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    protected $primaryKey = 'ID_VEHICULO';
    public $timestamps = true;

    protected $fillable = [
        'PATENTE_VEHICULO',
        'ID_TIPO_VEH',
        'MARCA',
        'MODELO_VEHICULO',
        'ANO_VEHICULO',
        'ID_UBICACION',
        'ESTADO_VEHICULO',
    ];
    // Relación con el tipo de vehículo
    public function tipoVehiculo()
    {
        return $this->belongsTo(TipoVehiculo::class, 'ID_TIPO_VEH');
    }

    // Relación con la ubicación
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'ID_UBICACION');
    }
}
