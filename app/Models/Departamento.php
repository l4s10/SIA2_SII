<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';
    protected $primaryKey = 'ID_DEPART';
    public $timestamps = false;

    protected $fillable = [
        'DEPARTAMENTO',
        //'ID_DIRECCION'
    ];
    public static $rules = [
        'DEPARTAMENTO' => 'required|unique:departamento,DEPARTAMENTO|max:128',
    ];

    public static $messages = [
        'required' => 'El campo " :attribute" es requerido.',
        'unique' => 'El " :attribute" ingresada ya existe.',
        'max' => 'El campo " :attribute" no debe exceder los 128 caracteres.',
        //'exists' => 'El valor seleccionado para :attribute no es válido.'
    ];

    //* Obtener el grado a través de la ID_GRADO */
    /*public function direccionRegional()
    {
        return $this->belongsTo(DireccionRegional::class, 'ID_DIRECCION');
    }*/
}
