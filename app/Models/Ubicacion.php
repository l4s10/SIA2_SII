<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $table = 'ubicacion';
    protected $primaryKey = 'ID_UBICACION';
    public $timestamps = false;

    protected $fillable = [
        'UBICACION',
        'ID_DIRECCION'
    ];

    //* Agregamos validaciones para la tabla de direcciones regionales*/
    public static $rules = [
        'UBICACION' => 'required|unique:ubicacion,UBICACION|max:128',
        'ID_DIRECCION' => 'required|exists:direcciones_regionales,ID_DIRECCION',
    ];

    public static $messages = [
        'UBICACION.required' => 'El campo "Ubicación" es requerido.',
        'UBICACION.unique' => 'La "Ubicación" ingresada ya existe.',
        'UBICACION.max' => 'El campo "Ubicación" no debe exceder los 128 caracteres.',
        'ID_DIRECCION.required' => 'El campo "dirección regional asociada" es requerido.'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'ID_UBICACION');
    }

    public function direccion()
    {
        return $this->belongsTo(DireccionRegional::class, 'ID_DIRECCION');
    }
}
