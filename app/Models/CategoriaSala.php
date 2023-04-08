<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaSala extends Model
{
    use HasFactory;
    protected $table = 'categoria_salas';
    public $timestamps = false;
    protected $primaryKey = 'ID_CATEGORIA_SALA';
    protected $fillable = ['CATEGORIA_SALA'];
}
