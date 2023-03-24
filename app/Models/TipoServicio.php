<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    use HasFactory;
    protected $table = 'tipo_servicio';
    protected $primaryKey = 'ID_TIPO_SERVICIO';
    public $timestamps = false;
}
