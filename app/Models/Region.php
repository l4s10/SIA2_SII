<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'region';
    protected $primaryKey = 'ID_REGION';
    public $timestamps = false;

    protected $fillable = [
        'REGION',
        'ID_COMUNA',
        'ID_DIRECCION'
    ];

    //* Agregamos validaciones para la tabla de regiones*/
    public static $rules = [
        'REGION' => 'required|unique:region,REGION|max:128',
        'ID_COMUNA' => 'required|integer|exists:comunas,ID_COMUNA',
        'ID_DIRECCION' => 'required|integer|exists:direcciones_regionales,ID_DIRECCION'

    ];

    public static $messages = [
        'required' => 'El campo " :attribute" es requerido.',
        'unique' => 'La región ingresada ya existe.',
        'max' => 'El campo " :attribute" no debe exceder los 128 caracteres.',
        'exists' => 'El valor seleccionado para " :attribute" no es válido.'
    ];


    public function comunas()
    {
        return $this->hasMany(Comuna::class, 'ID_REGION');
    }

    public function direccionesRegionales()
    {
        return $this->hasMany(DireccionRegional::class, 'ID_REGION');
    }

}