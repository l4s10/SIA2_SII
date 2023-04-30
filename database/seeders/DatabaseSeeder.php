<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TipoReparacion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            FuncionariosSeeder::class,
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
        ]);
    }
}
