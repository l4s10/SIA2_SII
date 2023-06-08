<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class FuncionariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //*CUENTA USUARIO MAESTRO
        $user_administrador = User::create([
            'NOMBRES' => 'USUARIO DEMO',
            'APELLIDOS' => 'SIA',
            'email' => 'admin@demo.com',
            'password' => Hash::make('12345678'),
            'RUT' => '11.111.111-3',
            'ID_DEPART' => 2,
            'ID_REGION' => 1,
            'ID_UBICACION' => 1,
            'ID_GRUPO' => 1,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 1,
            'ID_CARGO' => 1,
            'FECHA_NAC' => '2001-02-20',
            'FECHA_INGRESO' => '2023-02-28',
            'ID_CALIDAD_JURIDICA' => 1,
            'FONO' => '+56 9 8312 3550',
            'ANEXO' => 'TEST',
            'ID_SEXO' => 1
        ]);
        //*CUENTA USUARIO SERVICIOS
        $user_servicios = User::create([
            'NOMBRES' => 'USUARIO DEMO',
            'APELLIDOS' => 'SIA',
            'email' => 'servicios@demo.com',
            'password' => Hash::make('12345678'),
            'RUT' => '11.111.111-2',
            'ID_DEPART' => 2,
            'ID_REGION' => 1,
            'ID_UBICACION' => 1,
            'ID_GRUPO' => 1,
            'ID_CARGO' => 2,
            'ID_ESCALAFON' => 1,
            'ID_GRADO' => 1,
            'FECHA_NAC' => '1970-02-10',
            'FECHA_INGRESO' => '2001-02-22',
            'ID_CALIDAD_JURIDICA' => 1,
            'FONO' => '+56 9 1234 5678',
            'ANEXO' => 'TEST',
            'ID_SEXO' => 1
        ]);
        //*CUENTA USUARIO INFORMATICA
        $user_informatica = User::create([
            'NOMBRES' => 'USUARIO DEMO',
            'APELLIDOS' => 'SIA',
            'email' => 'informatica@demo.com',
            'password' => Hash::make('12345678'),
            'RUT' => '11.111.111-5',
            'ID_DEPART' => 2,
            'ID_REGION' => 1,
            'ID_UBICACION' => 1,
            'ID_GRUPO' => 1,
            'ID_ESCALAFON' => 1,
            'ID_GRADO' => 1,
            'ID_CARGO' => 1,
            'FECHA_NAC' => '1970-02-15',
            'FECHA_INGRESO' => '2001-05-25',
            'ID_CALIDAD_JURIDICA' => 1,
            'FONO' => '+56 9 1234 5678',
            'ANEXO' => 'TEST',
            'ID_SEXO' => 1
        ]);
        //*CUENTA USUARIO JURIDICO
        $user_juridico = User::create([
            'NOMBRES' => 'USUARIO DEMO',
            'APELLIDOS' => 'SIA',
            'email' => 'juridico@demo.com',
            'password' => Hash::make('12345678'),
            'RUT' => '11.111.111-4',
            'ID_DEPART' => 2,
            'ID_REGION' => 1,
            'ID_UBICACION' => 1,
            'ID_GRUPO' => 1,
            'ID_ESCALAFON' => 1,
            'ID_GRADO' => 1,
            'ID_CARGO' => 1,
            'FECHA_NAC' => '1980-05-20',
            'FECHA_INGRESO' => '2001-05-25',
            'ID_CALIDAD_JURIDICA' => 1,
            'FONO' => '+56 9 1234 5678',
            'ANEXO' => 'TEST',
            'ID_SEXO' => 1
        ]);
        //*CUENTA USUARIO FUNCIONARIO
        $user_funcionario = User::create([
            'NOMBRES' => 'USUARIO DEMO',
            'APELLIDOS' => 'SIA',
            'email' => 'funcionario@demo.com',
            'password' => Hash::make('12345678'),
            'RUT' => '11.111.111-1',
            'ID_DEPART' => 2,
            'ID_REGION' => 1,
            'ID_UBICACION' => 1,
            'ID_GRUPO' => 1,
            'ID_ESCALAFON' => 5,
            'ID_GRADO' => 1,
            'ID_CARGO' => 2,
            'FECHA_NAC' => '1970-02-10',
            'FECHA_INGRESO' => '2001-02-22',
            'ID_CALIDAD_JURIDICA' => 1,
            'FONO' => '+56 9 1234 5678',
            'ANEXO' => 'TEST',
            'ID_SEXO' => 1
        ]);

        //*Buscamos los roles por nombre
        $adminMaestro = Role::findByName('ADMINISTRADOR');
        $rolServicios = Role::findByName('SERVICIOS');
        $rolInformatica = Role::findByName('INFORMATICA');
        $rolJuridico = Role::findByName('JURIDICO');
        $rolFuncionario = Role::findByName('FUNCIONARIO');

        //*Asignamos roles a usuarios creados
        $user_administrador->assignRole($adminMaestro);
        $user_servicios->assignRole($rolServicios);
        $user_informatica->assignRole($rolInformatica);
        $user_juridico->assignRole($rolJuridico);
        $user_funcionario->assignRole($rolFuncionario);
    }
}
