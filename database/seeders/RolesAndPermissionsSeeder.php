<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //*Roles*/
        $AdministradorNv3 = Role::create(['name' => 'ADMINISTRADOR_MAESTRO']);
        $AdministradorNv2 = Role::create(['name' => 'ADMINISTRADOR']);
        $Informatica = Role::create(['name' => 'INFORMATICA']);
        $Funcionario = Role::create(['name' => 'FUNCIONARIO']);

        //*permisos*/
        $Nivel_1 = Permission::create(['name' => 'Nivel 1']);
        $Nivel_2 = Permission::create(['name' => 'Nivel 2']);
        $Nivel_3 = Permission::create(['name' => 'Nivel 3']);

        //*Asignacion de permisos*/
        $AdministradorNv3->syncPermissions([$Nivel_1, $Nivel_2, $Nivel_3]);
        $AdministradorNv2->syncPermissions([$Nivel_1, $Nivel_2]);
        $Informatica->syncPermissions([$Nivel_1, $Nivel_2]);
        $Funcionario->syncPermissions([$Nivel_1]);
    }
}
