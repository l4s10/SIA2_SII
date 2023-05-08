<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;

    protected $table = 'sexo';
    protected $primaryKey = 'ID_SEXO';
    public $timestamps = false;

    protected $fillable = [
        'SEXO'
    ];
}
