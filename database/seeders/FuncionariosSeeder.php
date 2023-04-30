<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class FuncionariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            [
                'name' => 'FRANCISCO IGNACIO MUÑOZ VALDEBENITO',
                'email' => 'franciscomunoz142@gmail.com',
                'password' => bcrypt('12345678'),
                'rut' => '16.738.235-5',
                'depto' => 'ADMINISTRACION',
                'region' => 'BIO-BIO',
                'ubicacion' => 'CONCEPCION',
                'grupo' => 'DATO PRUEBA',
                'escalafon' => 'DATO PRUEBA',
                'grado' => 'DATO DE PRUEBA',
                'fecha_nacimiento' => '2001-02-20',
                'fecha_ingreso' => '2023-02-28',
                'fecha_asim_planta' => '2023-02-28',
                'funcion' => 'Jefe de proyecto',
                'profesion' => 'Ingeniero Informatico',
                'area' => 'Informatica',
                'fono' => '+56 9 8312 3550',
                'anexo' => '+56 9 8312 3550',
                'sexo' => 'M',
            ],
            // Agrega más datos de usuarios aquí
        ];

        foreach ($usuarios as $usuario) {
            $user = User::create($usuario);
            $adminMaestro = Role::findByName('ADMINISTRADOR_MAESTRO');
            $user->assignRole($adminMaestro);
        }
    }
}
