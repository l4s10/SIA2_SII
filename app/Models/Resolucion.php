<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cargo;
use App\Models\TipoResolucion;
use App\Models\Facultad;

class Resolucion extends Model
{
    use HasFactory;

    protected $table = 'resoluciones';
    protected $primaryKey = 'ID_RESOLUCION';
    public $timestamps = false;

    protected $fillable = [
        'NRO_RESOLUCION',
        'FECHA',
        'ID_TIPO',
        'ID_FIRMANTE',
        'ID_FACULTAD',
        'ID_DELEGADO',
        'DOCUMENTO',
        'OBSERVACIONES'
    ];

    //* Agregamos validaciones para la tabla de resoluciones delegatorias*/
    public static function rules($resolucionId){
        return[
            'NRO_RESOLUCION' => 'required|unique:resoluciones,NRO_RESOLUCION,'.$resolucionId.',ID_RESOLUCION|integer',
            'FECHA' => 'required|string',
            'ID_TIPO' => 'required|integer|exists:tipo_resoluciones,ID_TIPO',
            'ID_FIRMANTE' => 'required|integer|exists:cargos,ID_CARGO',
            'ID_FACULTAD' => 'required|integer|exists:facultades,ID_FACULTAD',
            'ID_DELEGADO' => 'required|integer|exists:cargos,ID_CARGO',
            'OBSERVACIONES' => 'string|max:512'
        ];
    }
    public static function messages(){
        return[
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'integer' => 'El campo :attribute debe ser un número entero.',
            'max' => 'El campo :attribute no debe exceder los :max caracteres.',
            'exists' => 'El valor seleccionado para :attribute no es válido.'
        ];
    }


    public function firmante()
    {
        return $this->belongsTo(Cargo::class, 'ID_FIRMANTE', 'ID_CARGO');
    }

    public function delegado()
    {
        return $this->belongsTo(Cargo::class, 'ID_DELEGADO', 'ID_CARGO');
    }

    public function tipo()
    {
        return $this->belongsTo(TipoResolucion::class, 'ID_TIPO', 'ID_TIPO');
    }

    public function facultad()
    {
        return $this->belongsTo(Facultad::class, 'ID_FACULTAD', 'ID_FACULTAD');
    }

}
