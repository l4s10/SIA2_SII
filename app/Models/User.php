<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
// use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    // use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    //*CAMPOS QUE RECIBE LA BDD*/
    protected $fillable = [
        'NOMBRES',
        'APELLIDOS',
        'email',
        'password',
        'RUT',
        // 'entidad_id',
        // 'entidad_type',
        'ID_UBICACION',
        'ID_REGION',
        'ID_GRUPO',
        'ID_ESCALAFON',
        'ID_GRADO',
        'ID_CARGO',
        'FECHA_NAC',
        'FECHA_INGRESO',
        // 'FECHA_ASIM_O_1',
        'ID_CALIDAD_JURIDICA',
        'FONO',
        'ANEXO',
        'ID_SEXO'
    ];

    public static $rules = [
        'NOMBRES' => 'required|string|max:255',
        'APELLIDOS' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'nullable|string|min:8|confirmed',
        'RUT' => 'required|string|max:20|unique:users',
        'ID_UBICACION' => 'required|numeric',
        'ID_REGION' => 'required|numeric',
        'ID_GRUPO' => 'required|numeric',
        'ID_ESCALAFON' => 'required|numeric',
        'ID_GRADO' => 'required|numeric',
        'ID_CARGO' => 'required|numeric',
        'FECHA_NAC' => 'required|date',
        'FECHA_INGRESO' => 'required|date',
        'ID_CALIDAD_JURIDICA' => 'required|numeric',
        'FONO' => 'required|string|max:255',
        'ANEXO' => 'required|string|max:255',
        'ID_SEXO' => 'required|numeric',
    ];
    //*MENSAJES DE ERROR PARA EL FORMULARIO*/
    public static $messages = [
        'NOMBRES.required' => 'El campo NOMBRES es obligatorio',
        'NOMBRES.string' => 'El campo NOMBRES debe ser una cadena de texto',
        'NOMBRES.max' => 'El campo NOMBRES no puede tener más de 255 caracteres',
        'APELLIDOS.required' => 'El campo APELLIDOS es obligatorio',
        'APELLIDOS.string' => 'El campo APELLIDOS debe ser una cadena de texto',
        'APELLIDOS.max' => 'El campo APELLIDOS no puede tener más de 255 caracteres',
        'email.required' => 'El campo correo electrónico es obligatorio',
        'email.string' => 'El campo correo electrónico debe ser una cadena de texto',
        'email.email' => 'El campo correo electrónico debe ser una dirección de correo electrónico válida',
        'email.max' => 'El campo correo electrónico no puede tener más de 255 caracteres',
        'email.unique' => 'El correo electrónico ya está registrado en el sistema',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        'password.confirmed' => 'Las contraseñas no coinciden',
        'RUT.required' => 'El campo RUT es obligatorio',
        'RUT.string' => 'El campo RUT debe ser una cadena de texto',
        'RUT.max' => 'El campo RUT no puede tener más de 20 caracteres',
        'RUT.unique' => 'El RUT ya está registrado en el sistema',

        'ID_UBICACION.required' => 'El campo ID_REGION es obligatorio',
        'ID_UBICACION.numeric' => 'El campo ID_REGION debe ser un dato numerico',

        'ID_REGION.required' => 'El campo ID_REGION es obligatorio',
        'ID_REGION.numeric' => 'El campo ID_REGION debe ser un dato numerico',
        'ID_GRUPO.required' => 'El campo ID_GRUPO es obligatorio',
        'ID_GRUPO.numeric' => 'El campo ID_GRUPO debe ser un dato numerico',
        'ID_ESCALAFON.required' => 'El campo ESCALAFON es requerido',
        'ID_ESCALAFON.numeric' => 'El campo ID_ESCALAFON debe ser un dato numerico',
        'ID_GRADO.required' => 'El campo ID_GRADO es obligatorio',
        'ID_GRADO.numeric' => 'El campo ID_GRADO debe ser un dato numerico',
        'ID_CARGO.required' => 'El campo ID_CARGO es obligatorio',
        'ID_CARGO.numeric' => 'El campo ID_CARGO debe ser un dato numerico',
        'FECHA_NAC.required' => 'La fecha de nacimiento es obligatoria',
        'FECHA_NAC.date' => 'La fecha de nacimiento debe ser una fecha válida',
        'FECHA_INGRESO.required' => 'La fecha de ingreso es obligatoria',
        'FECHA_INGRESO.date' => 'La fecha de ingreso debe ser una fecha válida',
        'ID_CALIDAD_JURIDICA.required' => 'El ID de calidad jurídica es obligatorio',
        'ID_CALIDAD_JURIDICA.numeric' => 'El ID de calidad jurídica debe ser un número',
        'FONO.required' => 'El teléfono es obligatorio',
        'FONO.string' => 'El teléfono debe ser una cadena de texto',
        'FONO.max' => 'El teléfono no debe ser mayor que :max caracteres',
        'ANEXO.required' => 'El anexo es obligatorio',
        'ANEXO.string' => 'El anexo debe ser una cadena de texto',
        'ANEXO.max' => 'El anexo no debe ser mayor que :max caracteres',
        'ID_SEXO.required' => 'El ID de sexo es obligatorio',
        'ID_SEXO.string' => 'El ID de sexo debe ser una cadena de texto',
        'ID_SEXO.max' => 'El ID de sexo no debe ser mayor que :max caracteres',
    ];
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    public function entidad()
    {
        return $this->morphTo();
    }
    public function getEntidadInfoAttribute()
    {
        if ($this->entidad) {
            if (get_class($this->entidad) === 'App\Models\Departamento') {
                return $this->entidad->DEPARTAMENTO;
            } else if (get_class($this->entidad) === 'App\Models\Ubicacion') {
                return $this->entidad->UBICACION;
            }
        }
        return 'No asignado';
    }

    //*Obtener region a traves de la ID*/
    public function region()
    {
        return $this->belongsTo(Region::class, 'ID_REGION');
    }

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'ID_UBICACION');
    }

    //* Obtener el grupo a través de la ID_GRUPO */
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'ID_GRUPO');
    }

    //* Obtener el escalafón a través de la ID_ESCALAFON */
    public function escalafon()
    {
        return $this->belongsTo(Escalafon::class, 'ID_ESCALAFON');
    }

    //* Obtener el grado a través de la ID_GRADO */
    public function grado()
    {
        return $this->belongsTo(Grado::class, 'ID_GRADO');
    }
    //* Obtener el grado a través de la ID_GRADO */
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'ID_CARGO');
    }

    //* Obtener la calidad jurídica a través de la ID_CALIDAD_JURIDICA */
    public function calidadJuridica()
    {
        return $this->belongsTo(CalidadJuridica::class, 'ID_CALIDAD_JURIDICA', 'ID_CALIDAD');
    }
    //* Obtener el sexo a través de la ID_SEXO */
    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'ID_SEXO');
    }
    //* Asocia a los usuarios con las pólizas de seguro de conductores */
    public function polizas()
    {
        return $this->hasMany(Poliza::class, 'ID');
    }

    /*public function resoluciones()
    {
        return $this->hasMany(Resolucion::class, 'ID_RESOLUCION', 'ID_USER');
    }*/

}
