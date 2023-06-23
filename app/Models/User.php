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
        // 'ID_DEPART',
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
        // 'ID_DEPART.required' => 'El campo ID_DEPART es obligatorio',
        // 'ID_DEPART.numeric' => 'El campo ID_DEPART debe ser un dato numerico',
        'ID_REGION.required' => 'El campo ID_REGION es obligatorio',
        'ID_REGION.numeric' => 'El campo ID_REGION debe ser un dato numerico',
        'ID_UBICACION.required' => 'El campo ID_UBICACION es obligatorio',
        'ID_UBICACION.numeric' => 'El campo ID_UBICACION debe ser un dato numerico',
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

    //*Obtener depto desde su ID*/
    // public function departamento()
    // {
    //     return $this->belongsTo(Departamento::class, 'ID_DEPART');
    // }

    //*Obtener region a traves de la ID*/
    public function region()
    {
        return $this->belongsTo(Region::class, 'ID_REGION');
    }
    //* Obtener la ubicación a través de la ID_UBICACION */
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

    /*public function resoluciones()
    {
        return $this->hasMany(Resolucion::class, 'ID_RESOLUCION', 'ID_USER');
    }*/

}
