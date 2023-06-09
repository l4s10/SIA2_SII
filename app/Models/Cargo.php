<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    protected $table = 'cargos';
    protected $primaryKey = 'ID_CARGO';
    public $timestamps = false;

    protected $fillable = [
        'CARGO'
    ];

    //* Agregamos validaciones para la tabla de cargos*/
    public static $rules = [
        'CARGO' => 'required|unique:cargos,CARGO|max:128'
    ];

    public static $messages = [
        'CARGO.required' => 'El campo "Cargo" es requerido.',
        'CARGO.unique' => 'La "Cargo" ingresada ya existe.',
        'CARGO.max' => 'El campo "Cargo" no debe exceder los 128 caracteres.'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'ID_CARGO');
    }

    public function resoluciones()
    {
        return $this->hasMany(Resolución::class, 'ID_CARGO');
    }


}