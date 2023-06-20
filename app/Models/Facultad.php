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
            'NOMBRE' => 'required|string|max:128|unique:facultades',
            'CONTENIDO' => 'required|string|max:1000',
            'LEY_ASOCIADA' => 'required|string|max:128',
            'ART_LEY_ASOCIADA' => 'required|string|numeric|max:128'
        ];
    }
    public static function messages(){
        return[
            'required' => ' El campo ":attribute" es obligatorio.',
            'string' => ' El campo ":attribute" debe ser una cadena de texto.',
            'numeric' => ' El campo "Art. ley asociada" debe ser numérico.',
            'max' => ' El campo ":attribute" no debe exceder los :max caracteres.',
            'unique' => ' El campo ":attribute" existe actualmente en la base de datos.'
        ];
    }

}
