<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DireccionRegional extends Model
{
    use HasFactory;

    protected $table = 'direcciones_regionales';
    protected $primaryKey = 'ID_DIRECCION';
    public $timestamps = false;

     //* Atributos Fillables*/
    protected $fillable = [
        'DIRECCION',
        'ID_REGION'
    ];

    //* Validaciones para la tabla de direcciones regionales*/
    public static $rules = [
        'DIRECCION' => 'required|unique:direcciones_regionales,DIRECCION|max:128',
        'ID_REGION' => 'required|exists:region,ID_REGION',
    ];

    public static $messages = [
        'DIRECCION.required' => 'El campo "Dirección Regional" es requerido.',
        'DIRECCION.unique' => 'La "Dirección Regional" ingresada ya existe.',
        'DIRECCION.max' => 'El campo "Dirección Regional" no debe exceder los 128 caracteres.',
        'ID_REGION.required' => 'El campo "region asociada" es requerido.',
        'ID_REGION.exists' => 'El valor seleccionado para "region asociada" no es válido.'
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'ID_REGION');
    }
    // Relación de uno a muchos con Ubicacion
    public function ubicaciones()
    {
        return $this->hasMany(Ubicacion::class, 'ID_DIRECCION');
    }
    /*public function ubicaciones()
    {
        return $this->hasMany(Ubicacion::class, 'ID_DIRECCION');
    }
    public function departamentos()
    {
        return $this->hasMany(Departamento::class, 'ID_DEPARTAMENTO');
    }*/

}
