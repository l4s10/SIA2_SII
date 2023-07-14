<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Poliza extends Model
{
    protected $table = 'polizas';
    protected $primaryKey = 'ID_POLIZA';
    protected $fillable = ['ID', 'FECHA_VENCIMIENTO_LICENCIA', 'NRO_POLIZA'];
    public $timestamps = false;

    public static function rules(){
        return[
            'NRO_POLIZA' => 'required|integer',
            'FECHA_VENCIMIENTO_LICENCIA' => 'required|string',
            'ID' => 'exists:users,id' // regla 'exists' para validar que el ID exista en la tabla 'funcionarios'
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

    
    public function user()
        {
            return $this->belongsTo(User::class, 'ID', 'id');
        }

}


