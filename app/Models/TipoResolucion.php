<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoResolucion extends Model
{
    use HasFactory;

    protected $table = 'tipo_resoluciones';
    protected $primaryKey = 'ID_TIPO';
    public $timestamps = false;

    protected $fillable = [
        'NOMBRE',
    ];

    //* Agregamos validaciones para la tabla de resoluciones delegatorias*/
    public static function rules(){
        return[
            'NOMBRE' => 'required|string|max:128',
        ];
    }
    public static function messages(){
        return[
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'max' => 'El campo :attribute no debe exceder los :max caracteres.'
        ];
    }

}
