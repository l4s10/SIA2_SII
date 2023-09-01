<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateRelFunEquiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registros = DB::table('rel_fun_equipos')->get();

        foreach ($registros as $registro) {
            $fechaCreacion = Carbon::create(2019, 7, 1)->toDateTimeString();
            $fechaAtencion = Carbon::create(2019, 7, 4)->toDateTimeString();
            $fechaInicioEquipo = Carbon::create(2019, 7, 7)->toDateTimeString();
            $fechaFinEquipo = Carbon::create(2019, 7, 10)->toDateTimeString();

            DB::table('rel_fun_equipos')
                ->where('ID_SOL_EQUIPOS', $registro->ID_SOL_EQUIPOS)
                ->update([
                    'created_at' => $fechaCreacion,
                    'updated_at' => $fechaCreacion,
                    'FECHA_ATENCION' => $fechaAtencion,
                    'FECHA_SOL_EQUIPO' => $fechaInicioEquipo,
                    'FECHA_INICIO_EQUIPO' => $fechaInicioEquipo,
                    'FECHA_FIN_EQUIPO' => $fechaFinEquipo,
                ]);
        }
    }
}
