<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rut',
        'depto',
        'region',
        'ubicacion',
        'grupo',
        'escalafon',
        'grado',
        'fecha_nacimiento',
        'fecha_ingreso',
        'fecha_asim_planta',
        'funcion',
        'profesion',
        'area',
        'fono',
        'anexo',
        'sexo',
    ];

    public static $messages = [
        'name.required' => 'El campo nombre es obligatorio.',
        'name.string' => 'El campo nombre debe ser un texto.',
        'name.max' => 'El campo nombre no puede ser mayor a :max caracteres.',

        'email.required' => 'El campo correo electrónico es obligatorio.',
        'email.string' => 'El campo correo electrónico debe ser un texto.',
        'email.email' => 'El campo correo electrónico debe ser una dirección de correo electrónico válida.',
        'email.max' => 'El campo correo electrónico no puede ser mayor a :max caracteres.',
        'email.unique' => 'El correo electrónico ya ha sido registrado.',

        'password.required' => 'El campo contraseña es obligatorio.',
        'password.string' => 'El campo contraseña debe ser un texto.',
        'password.min' => 'El campo contraseña debe tener al menos :min caracteres.',

        'rut.required' => 'El campo rut es obligatorio.',
        'rut.string' => 'El campo rut debe ser un texto.',
        'rut.max' => 'El campo rut no puede ser mayor a :max caracteres.',
        'rut.unique' => 'El rut ya ha sido registrado.',

        'depto.required' => 'El campo departamento es obligatorio.',
        'depto.string' => 'El campo departamento debe ser un texto.',
        'depto.max' => 'El campo departamento no puede ser mayor a :max caracteres.',

        'region.string' => 'El campo región debe ser un texto.',
        'region.max' => 'El campo región no puede ser mayor a :max caracteres.',

        'ubicacion.string' => 'El campo ubicación debe ser un texto.',
        'ubicacion.max' => 'El campo ubicación no puede ser mayor a :max caracteres.',

        'grupo.string' => 'El campo grupo debe ser un texto.',
        'grupo.max' => 'El campo grupo no puede ser mayor a :max caracteres.',

        'escalafon.string' => 'El campo escalafón debe ser un texto.',
        'escalafon.max' => 'El campo escalafón no puede ser mayor a :max caracteres.',

        'grado.string' => 'El campo grado debe ser un texto.',
        'grado.max' => 'El campo grado no puede ser mayor a :max caracteres.',

        'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',

        'fecha_ingreso.date' => 'El campo fecha de ingreso debe ser una fecha válida.',

        'fecha_asim_planta.date' => 'El campo fecha de asimilación a planta debe ser una fecha válida.',

        'funcion.string' => 'El campo función debe ser un texto.',
        'funcion.max' => 'El campo función no puede ser mayor a :max caracteres.',

        'profesion.string' => 'El campo profesión debe ser un texto.',
        'profesion.max' => 'El campo profesión no puede ser mayor a :max caracteres.',

        'area.string' => 'El campo área debe ser un texto.',
        'area.max' => 'El campo área no puede ser mayor a :max caracteres.',

        'fono.string' => 'El campo fono debe ser un texto.',
        'fono.max' => 'El campo fono no puede ser mayor a :max caracteres.',
        'anexo.max' => 'El campo Anexo no puede tener más de :max caracteres',
        'sexo.max' => 'El campo Sexo no puede tener más de :max caracter',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    // protected $appends = [
    //     'profile_photo_url',
    // ];

}
