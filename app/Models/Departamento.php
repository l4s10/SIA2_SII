<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';
    protected $primaryKey = 'ID_DEPARTAMENTO';
    public $timestamps = false;

    protected $fillable = [
        'DEPARTAMENTO',
    ];
    public static $rules = [
        'DEPARTAMENTO' => 'required|max:128',
    ];

    public static $messages = [
        'required' => 'El campo " :attribute" es requerido.',
        'max' => 'El campo " :attribute" no debe exceder los 128 caracteres.'
    ];

    public function users()
    {
        return $this->morphMany(User::class, 'entidad', 'entidad_tipo', null, 'ID_DEPARTAMENTO');
    }

}
