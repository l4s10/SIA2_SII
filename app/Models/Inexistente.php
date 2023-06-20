<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inexistente extends Model
{
    use HasFactory;

    protected $table = 'inexistentes';
    protected $fillable = [
        'ID_FORMULARIO',
        'RUT',
        'NOMBRE',
        'MATERIAL',
        'CANTIDAD',
        'MOTIVO',
        'FECHA_PETICION',
        'ESTADO',
        'OBSERVACIONES',
        'ID_USUARIO'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_USUARIO', 'id'); // Agrega la relación con el modelo User
    }
}
