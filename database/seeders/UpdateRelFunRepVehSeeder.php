<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateRelFunRepVehSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registros = DB::table('rel_fun_rep_veh')->get();

        foreach ($registros as $registro) {
            $fechaCreacion = Carbon::create(2019, 7, 1)->toDateTimeString();
            $fechaAtencion = Carbon::create(2019, 7, 4)->toDateTimeString();
            $fechaInicioRep = Carbon::create(2019, 7, 7)->toDateTimeString();
            $fechaTerminoRep = Carbon::create(2019, 7, 10)->toDateTimeString();

            DB::table('rel_fun_rep_veh')
                ->where('ID_SOL_REP_VEH', $registro->ID_SOL_REP_VEH)
                ->update([
                    'created_at' => $fechaCreacion,
                    'updated_at' => $fechaCreacion,
                    'FECHA_ATENCION' => $fechaAtencion,
                    'FECHA_INICIO_REP_VEH' => $fechaInicioRep,
                    'FECHA_TERMINO_REP_VEH' => $fechaTerminoRep,
                ]);
        }
    }
}
