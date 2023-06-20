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

    protected $fillable = [
        'DIRECCION'
    ];

    //* Agregamos validaciones para la tabla de direcciones regionales*/
    public static $rules = [
        'DIRECCION' => 'required|unique:direcciones_regionales,DIRECCION|max:128'
    ];

    public static $messages = [
        'DIRECCION.required' => 'El campo "Dirección Regional" es requerido.',
        'DIRECCION.unique' => 'La "Dirección Regional" ingresada ya existe.',
        'DIRECCION.max' => 'El campo "Dirección Regional" no debe exceder los 128 caracteres.'
    ];

}