<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateSolicitudesWithoutDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('rel_fun_mat')
            ->whereNull('created_at')
            ->update(['created_at' => '2019-07-01 00:00:00']);

        DB::table('rel_fun_form')
            ->whereNull('created_at')
            ->update(['created_at' => '2019-07-01 00:00:00']);

        DB::table('rel_fun_equipos')
            ->whereNull('created_at')
            ->update(['created_at' => '2019-07-01 00:00:00']);
    }
}
