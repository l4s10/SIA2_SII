<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudMateriales extends Model
{
    use HasFactory;
    protected $table='solicitud_materiales';
    protected $fillable= ['NOMBRE_SOLICITANTE','RUT','DEPTO','EMAIL','TIPO_MAT_SOL','MATERIAL_SOL','ESTADO_SOL'];
    protected $primaryKey= 'ID_SOLICITUD';
}
