<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SolicitudMateriales extends Model
{
    use HasFactory;
    protected $primaryKey= 'ID_SOLICITUD';
    protected $table='rel_fun_mat';
    protected $fillable= [
        'ID_USUARIO',
        'NOMBRE_SOLICITANTE',
        'RUT',
        'DEPTO',
        'EMAIL',
        'MATERIAL_SOL',
        'FECHA_DESPACHO',
        'FECHA_RECEPCION',
        'OBSERVACIONES',
        'ESTADO_SOL',
        'MODIFICADO_POR'
    ];
    /*
        Para los graficos de promedio de dias:
        -> Calculo de dias en atender solicitud.
        -> Calculo de dias en despachar.
        -> Calculo de dias en confirmar recepción.
    */
    //Comparamos la fecha de creacion con la actual (para mostrar mientras no se atienda la solicitud)
    public function diasSinAtender()
    {
        $fechaInicio = new Carbon($this->created_at); // Usando el timestamp de creación
        $fechaActual = Carbon::now(); // Fecha y hora actual
        $dias = 0;

        while ($fechaInicio->lt($fechaActual)) {
            if (!$fechaInicio->isWeekend()) {
                $dias++;
            }
            $fechaInicio->addDay();
        }

        return $dias;  // Diferencia en días hábiles
    }
    //Calcula los dias entre la fecha de creacion y la fecha de despacho
    public function diasDeTramitacion()
    {
        if ($this->FECHA_DESPACHO) {
            $fechaInicio = new Carbon($this->created_at); // Usando el timestamp de creación
            $fechaFin = new Carbon($this->FECHA_DESPACHO);
            return $fechaInicio->diffInDays($fechaFin);
        } else {
            // La solicitud aún está en proceso, manejar como prefieras
            return null;
        }
    }
    //Comparamos la fecha inicial con la fecha de recepcion
    public function diasTotales(){
        if($this->FECHA_RECEPCION){
            $fechaInicio = new Carbon($this->created_at);
            $fechaFin = new Carbon($this->FECHA_RECEPCION);
            return $fechaInicio->diffInDays($fechaFin);
        }else{
            //Manejar que la solicitud aun esta en proceso
            return null;
        }
    }
}
