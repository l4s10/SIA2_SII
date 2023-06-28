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
        'REGION'
    ];

    //* Agregamos validaciones para la tabla de regiones*/
    public static $rules = [
        'REGION' => 'required|unique:region,REGION|max:128'
    ];

    public static $messages = [
        'REGION.required' => 'El campo Región es requerido.',
        'REGION.unique' => 'La región ingresada ya existe.',
        'REGION.max' => 'El campo Región no debe exceder los 128 caracteres.'
    ];

    // $request 
    // $data = $request->validate(Region::$rules, Region::$messages);

}