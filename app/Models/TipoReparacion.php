<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoReparacion extends Model
{
    use HasFactory;
    //Definimos tabla de BDD
    protected $table = 'tipo_reparacion';
    //Definimos llave primaria
    protected $primaryKey = 'ID_TIPO_REP_GENERAL';
    //Definimos llenables
    protected $fillable = [
        'TIPO_REP'
    ];

    public function re_fun_rep_general(){
        return $this->hasMany(RelFunRepGeneral::class, 'ID_TIPO_REP_GENERAL');
    }
}