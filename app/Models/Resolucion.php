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
        //'AUTORIDAD',
        'ID_CARGO',
        'FUNCIONARIOS_DELEGADOS',
        'MATERIA'
    ];

    //* Agregamos validaciones para la tabla de resoluciones delegatorias*/
    public static function rules($resolucionId){
        return[
            'NRO_RESOLUCION' => 'required|unique:resoluciones,NRO_RESOLUCION,'.$resolucionId.',ID_RESOLUCION|integer',
            'FECHA' => 'required|string',
            //'AUTORIDAD' => 'required|max:128',
            'ID_CARGO' => 'required|integer|exists:cargos,ID_CARGO',
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
            'exists' => 'El valor seleccionado para :attribute no es válido.'
        ];
    }
    
    
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'ID_CARGO', 'ID_CARGO');
    }

}