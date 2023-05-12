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
        $user = User::create([
            'NOMBRES' => 'FRANCISCO IGNACIO',
            'APELLIDOS' => 'MUÑOZ VALDEBENITO',
            'email' => 'franciscomunoz142@gmail.com',
            'password' => Hash::make('12345678'),
            'RUT' => '16.738.235-5',
            'ID_DEPART' => 2,
            'ID_REGION' => 1,
            'ID_UBICACION' => 1,
            'ID_GRUPO' => 1,
            'ID_ESCALAFON' => 1,
            'ID_GRADO' => 1,
            'FECHA_NAC' => '2001-02-20',
            'FECHA_INGRESO' => '2023-02-28',
            'ID_CALIDAD_JURIDICA' => 1,
            'FONO' => '+56 9 8312 3550',
            'ANEXO' => '+56 9 8312 3550',
            'ID_SEXO' => 1
        ]);

        $adminMaestro = Role::findByName('ADMINISTRADOR');
        $user->assignRole($adminMaestro);
    }
}
