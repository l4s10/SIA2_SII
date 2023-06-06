<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resolucion extends Model
{
    use HasFactory;

    protected $table = 'resoluciones';
    protected $primaryKey = 'ID_RESOLUCION';
    public $timestamps = false;

    protected $fillable = [
        'NRO_RESOLUCION',
        'FECHA',
        'AUTORIDAD',
        'FUNCIONARIOS_DELEGADOS',
        'MATERIA'
    ];

    //* Agregamos validaciones para la tabla de resoluciones delegatorias*/
    public static function rules(){
        return[
            'NRO_RESOLUCION' => 'required|unique:resoluciones,NRO_RESOLUCION|max:128',
            'FECHA' => 'required|string',
            'AUTORIDAD' => 'required|unique:resoluciones,AUTORIDAD|max:128',
            'FUNCIONARIOS_DELEGADOS' => 'nullable|string|max:128',
            'MATERIA' => 'nullable|string|max:255'
        ];
    }
    public static function messages(){
        return[
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'max' => 'El campo :attribute no debe exceder los :max caracteres.',
            //'email' => 'El campo :attribute debe ser una dirección de correo electrónico válida.',
            //'exists' => 'El valor seleccionado para :attribute no es válido.'
        ];
    }
    
    
    /*public static $rules = [
        'NRO_RESOLUCION' => 'required|unique:resoluciones,NRO_RESOLUCION|max:128',
        'FECHA' => 'required|string',
        'AUTORIDAD' => 'required|unique:resoluciones,AUTORIDAD|max:128',
        'FUNCIONARIOS_DELEGADOS' => 'nullable|string|max:128',
        'MATERIA' => 'nullable|string|max:255'
    ];

    public static $messages = [
        'NRO_RESOLUCION.required' => 'El campo "N° Resolución" es requerido.',
        'DIRECCION.unique' => 'La "Dirección Regional" ingresada ya existe.',
        'DIRECCION.max' => 'El campo "Dirección Regional" no debe exceder los 128 caracteres.'
    ];*/

}