<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $table = 'ubicacion';
    protected $primaryKey = 'ID_UBICACION';
    public $timestamps = false;

    protected $fillable = [
        'UBICACION'
    ];
}
