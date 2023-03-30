<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;
    //Definimos campos
    protected $table = 'formularios';
    protected $primaryKey = 'ID_FORMULARIO';
    protected $fillable = ['NOMBRE_FORMULARIO','TIPO_FORMULARIO'];
    public $timestamps = false;
}
