<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todos los usuarios
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            // Hashear y actualizar la contraseña para cada usuario
            $hashedPassword = Hash::make('12345678');

            DB::table('users')
                ->where('id', $user->id)
                ->update(['password' => $hashedPassword]);
        }
    }
}
