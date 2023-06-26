<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    //ID_COMUNA, COMUNA, ID_REGION;
    use HasFactory;
    protected $table = 'comunas';
    // Se cambia el ID predefinico por el nombre del ID de la tabla.
    protected $primaryKey = 'ID_COMUNA';
    public $timestamps = false;

    protected $fillable = [
        'COMUNA',
        'ID_REGION',
    ];

    public static $rules = [
        'COMUNA' => 'required|unique:comunas,COMUNA|max:128',
        'ID_REGION' => 'required|exists:region,ID_REGION',
    ];

    public static $messages = [
        'COMUNA.required' => 'El campo "nombre comuna" es requerido.',
        'COMUNA.unique' => 'La comuna ingresada ya existe.',
        'COMUNA.max' => 'El campo "nombre comuna" no debe exceder los 128 caracteres.'
    ];

    public function regionAsociada()
    {
        return $this->belongsTo(Region::class, 'ID_REGION');
    }

}