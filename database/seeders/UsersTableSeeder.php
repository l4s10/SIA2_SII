<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Ubicacion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $departamento = Departamento::first();
        $ubicacion = Ubicacion::first();

        User::create([
            'NOMBRES' => 'MARCELO',
            'APELLIDOS' => 'CASTRO BUSTOS',
            'email' => 'mdcastro@sii.cl',
            'password' => Hash::make('password'),
            'RUT' => '9298983-6',
            'FECHA_NAC' => '1965-11-03',
            'FECHA_INGRESO' => '1995-05-15',
            'FONO' => '41-3115206',
            'ANEXO' => '5206',
            'entidad_id' => $departamento->ID_DEPARTAMENTO,
            'entidad_type' => Departamento::class,
            'ID_REGION' => 1, // Asegúrate de tener este registro en tu tabla de regiones
            'ID_GRUPO' => 1, // Asegúrate de tener este registro en tu tabla de grupos
            'ID_ESCALAFON' => 1, // Asegúrate de tener este registro en tu tabla de escalafon
            'ID_GRADO' => 1, // Asegúrate de tener este registro en tu tabla de grados
            'ID_CARGO' => 1, // Asegúrate de tener este registro en tu tabla de cargos
            'ID_CALIDAD_JURIDICA' => 1, // Asegúrate de tener este registro en tu tabla de calidad_juridica
            'ID_SEXO' => 1, // Asegúrate de tener este registro en tu tabla de sexo
        ]);

        User::create([
            'NOMBRES' => 'CRISTIAN ALBERTO',
            'APELLIDOS' => 'GOMEZ CASTILLO',
            'email' => 'cagomez@sii.cl',
            'password' => Hash::make('password'),
            'RUT' => '11821718-7',
            'FECHA_NAC' => '1971-05-24',
            'FECHA_INGRESO' => '1999-02-01',
            'FONO' => '41-3115102',
            'ANEXO' => '5102',
            'entidad_id' => $ubicacion->ID_UBICACION,
            'entidad_type' => Ubicacion::class,
            'ID_REGION' => 1, // Asegúrate de tener este registro en tu tabla de regiones
            'ID_GRUPO' => 1, // Asegúrate de tener este registro en tu tabla de grupos
            'ID_ESCALAFON' => 1, // Asegúrate de tener este registro en tu tabla de escalafon
            'ID_GRADO' => 1, // Asegúrate de tener este registro en tu tabla de grados
            'ID_CARGO' => 1, // Asegúrate de tener este registro en tu tabla de cargos
            'ID_CALIDAD_JURIDICA' => 1, // Asegúrate de tener este registro en tu tabla de calidad_juridica
            'ID_SEXO' => 1, // Asegúrate de tener este registro en tu tabla de sexo
        ]);
    }
}

