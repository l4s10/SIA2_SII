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

    //* Atributos Fillables*/
    protected $fillable = [
        'REGION'
    ];

    //* Validaciones para la tabla de regiones*/
    public static $rules = [
        'REGION' => 'required|unique:region,REGION|max:128'
    ];

    //* Mensajes de validación*/
    public static $messages = [
        'REGION.required' => 'El campo Región es requerido.',
        'REGION.unique' => 'La región ingresada ya existe.',
        'REGION.max' => 'El campo Región no debe exceder los 128 caracteres.'
    ];


}