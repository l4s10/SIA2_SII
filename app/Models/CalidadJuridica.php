<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalidadJuridica extends Model
{
    use HasFactory;
    protected $table = 'calidad_juridica';
    protected $primaryKey = 'ID_CALIDAD_JURIDICA';
    public $timestamps = false;

    protected $fillable = [
        'CALIDAD'
    ];
}
