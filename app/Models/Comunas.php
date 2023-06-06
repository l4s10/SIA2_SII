<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunas extends Model
{
    use HasFactory;
    protected $table = 'comunas';
    protected $primaryKey = 'ID_COMUNA';
    public $timestamps = false;

    protected $fillable = [
        'COMUNA',
        'ID_REGION',
    ];

    //Funcion para mostrar REGION
    public function region(){
        return $this->belongsTo(Region::class, 'ID_REGION');
    }
}
