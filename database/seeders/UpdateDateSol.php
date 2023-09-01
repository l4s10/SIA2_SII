<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateDateSol extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtenemos todos los registros existentes en la tabla 'rel_fun_mat'
        $registros = DB::table('rel_fun_mat')->get();

        foreach ($registros as $registro) {
            // Fechas calculadas basadas en 2019-07-01
            $fechaCreacion = Carbon::create(2019, 7, 1)->toDateTimeString();
            $fechaAtencion = Carbon::create(2019, 7, 4)->toDateTimeString();
            $fechaDespacho = Carbon::create(2019, 7, 7)->toDateTimeString();
            $fechaRecepcion = Carbon::create(2019, 7, 10)->toDateTimeString();


            // Actualizamos cada registro individualmente
            DB::table('rel_fun_mat')
                ->where('ID_SOLICITUD', $registro->ID_SOLICITUD)
                ->update([
                    'created_at' => $fechaCreacion,
                    'updated_at' => $fechaCreacion,
                    'FECHA_ATENCION' => $fechaAtencion,
                    'FECHA_DESPACHO' => $fechaDespacho,
                    'FECHA_RECEPCION' => $fechaRecepcion,
                ]);
        }
    }
}
