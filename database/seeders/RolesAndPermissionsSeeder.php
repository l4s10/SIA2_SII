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
        $ADMINISTRADOR = Role::create(['name' => 'ADMINISTRADOR']);
        $SERVICIOS = Role::create(['name' => 'SERVICIOS']);
        $INFORMATICA = Role::create(['name' => 'INFORMATICA']);
        $JURIDICO = Role::create(['name' => 'JURIDICO']);
        $FUNCIONARIO = Role::create(['name' => 'FUNCIONARIO']);

        //*Permisos*/
        $Nivel_1 = Permission::create(['name' => 'Nivel 1']);
        $Nivel_2 = Permission::create(['name' => 'Nivel 2']);
        $Nivel_3 = Permission::create(['name' => 'Nivel 3']);

        //*Asignacion de permisos*/
        $ADMINISTRADOR->syncPermissions([$Nivel_1, $Nivel_2, $Nivel_3]);
        $SERVICIOS->syncPermissions([$Nivel_1, $Nivel_2]);
        $INFORMATICA->syncPermissions([$Nivel_1, $Nivel_2]);
        $JURIDICO->syncPermissions([$Nivel_1]);
        $FUNCIONARIO->syncPermissions([$Nivel_1]);
    }
}
