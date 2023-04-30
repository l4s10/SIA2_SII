<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'rut' => ['required', 'string', 'max:20', 'unique:users'],
            'depto' => ['required', 'string', 'max:255'],
            'region' => ['required', 'string', 'max:255'],
            'ubicacion' => ['required', 'string', 'max:255'],
            'grupo' => ['required', 'string', 'max:255'],
            'escalafon' => ['required', 'string', 'max:255'],
            'grado' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date'],
            'fecha_ingreso' => ['required', 'date'],
            'fecha_asim_planta' => ['required', 'date'],
            'funcion' => ['required', 'string', 'max:255'],
            'profesion' => ['required', 'string', 'max:255'],
            'area' => ['required', 'string', 'max:255'],
            'fono' => ['required', 'string', 'max:255'],
            'anexo' => ['required', 'string', 'max:255'],
            'sexo' => ['required', 'string', 'max:1'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'rut' => $input['rut'],
            'depto' => $input['depto'],
            'region' => $input['region'],
            'ubicacion' => $input['ubicacion'],
            'grupo' => $input['grupo'],
            'escalafon' => $input['escalafon'],
            'grado' => $input['grado'],
            'fecha_nacimiento' => $input['fecha_nacimiento'],
            'fecha_ingreso' => $input['fecha_ingreso'],
            'fecha_asim_planta' => $input['fecha_asim_planta'],
            'funcion' => $input['funcion'],
            'profesion' => $input['profesion'],
            'area' => $input['area'],
            'fono' => $input['fono'],
            'anexo' => $input['anexo'],
            'sexo' => $input['sexo'],
        ]);
    }
}
