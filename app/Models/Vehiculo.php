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
        // 'ID_UBICACION',
        'entidad_id',
        'entidad_type',
        'ESTADO_VEHICULO',
    ];
    public function entidad()
    {
        return $this->morphTo();
    }
    public function getEntidadInfoAttribute()
    {
        if ($this->entidad) {
            if (get_class($this->entidad) === 'App\Models\Departamento') {
                return $this->entidad->DEPARTAMENTO;
            } else if (get_class($this->entidad) === 'App\Models\Ubicacion') {
                return $this->entidad->UBICACION;
            }
        }
        return 'No asignado';
    }
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
