<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ModelHasRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleId = 5;
        $model = 'App\Models\User';

        for ($modelId = 6; $modelId <= 247; $modelId++) {
            DB::table('model_has_roles')->insert([
                'role_id' => $roleId,
                'model_type' => $model,
                'model_id' => $modelId,
            ]);
        }
    }
}
