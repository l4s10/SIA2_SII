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
        $roleIdForAllUsers = 5;
        $roleIdForUser8 = 1;
        $model = 'App\Models\User';

        $users = User::all();

        foreach ($users as $user) {
            $roleId = ($user->id == 8) ? $roleIdForUser8 : $roleIdForAllUsers;

            DB::table('model_has_roles')->insert([
                'role_id' => $roleId,
                'model_type' => $model,
                'model_id' => $user->id,
            ]);
        }
    }
}
