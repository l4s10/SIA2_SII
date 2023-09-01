<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateRelFunRepGeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registros = DB::table('rel_fun_rep_general')->get();

        foreach ($registros as $registro) {
            $fechaCreacion = Carbon::create(2019, 7, 1)->toDateTimeString();
            $fechaAtencion = Carbon::create(2019, 7, 4)->toDateString();
            $fechaProgramada = Carbon::create(2019, 7, 7)->toDateString();

            DB::table('rel_fun_rep_general')
                ->where('ID_REP_INM', $registro->ID_REP_INM)
                ->update([
                    'created_at' => $fechaCreacion,
                    'updated_at' => $fechaCreacion,
                    'FECHA_ATENCION' => $fechaAtencion,
                    'FECHA_PROGRAMADA' => $fechaProgramada,
                ]);
        }
    }
}
