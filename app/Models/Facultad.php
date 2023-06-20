<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;

    protected $table = 'facultades';
    protected $primaryKey = 'ID_FACULTAD';
    public $timestamps = false;

    protected $fillable = [
        'NOMBRE',
        'CONTENIDO',
        'LEY_ASOCIADA',
        'ART_LEY_ASOCIADA'
    ];

    //* Agregamos validaciones para la tabla de resoluciones delegatorias*/
    public static function rules(){
        return[
            'NOMBRE' => 'required|string|max:128',
            'CONTENIDO' => 'required|string|max:1000',
            'LEY_ASOCIADA' => 'required|string|max:128',
            'ART_LEY_ASOCIADA' => 'required|string|max:128'
        ];
    }
    public static function messages(){
        return[
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'max' => 'El campo :attribute no debe exceder los :max caracteres.'
        ];
    }

}
