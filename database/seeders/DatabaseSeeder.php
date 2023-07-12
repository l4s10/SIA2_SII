<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TipoReparacion;
use App\Models\TipoResolucion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //*Llamamos campos normalizados, roles y permisos y finalmente a usuarios */
            CamposUsuarioNormalizados::class,
            RolesAndPermissionsSeeder::class,
            // FuncionariosSeeder::class,
            //PolizasSeeder::class,
            FacultadesSeeder::class,
            TipoResolucionSeeder::class,
            ResolucionesSeeder::class,
            //*Llamar primero a los tipos de objetos*/
            MaterialTipoSeeder::class,
            TipoEquiposSeeder::class,
            TipoReparacionSeeder::class,
            TipoServicioSeeder::class,
            TipoVehiculoSeeder::class,
            //*LLamamos a los componentes */
            MaterialSeeder::class,
            FormularioSeeder::class,
            EquipoSeeder::class,
            CategoriaSalasSeeder::class,
            VehiculosSeeder::class,
        ]);
    }
}
