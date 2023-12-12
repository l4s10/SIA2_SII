<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RelFunRepGeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Establecer la fecha deseada
        $fechaDeseada = Carbon::create(2019, 7, 1);

        // Actualizar todos los registros
        DB::table('rel_fun_rep_general')->update([
            'created_at' => $fechaDeseada,
            'updated_at' => $fechaDeseada
        ]);
    }
}
