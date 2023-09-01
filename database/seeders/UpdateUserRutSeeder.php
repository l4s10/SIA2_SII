<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Utils\RutUtils;

class UpdateUserRutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->select('id', 'RUT')->get();

        foreach ($users as $user) {
            $formattedRut = RutUtils::formatRut($user->RUT);
            DB::table('users')
                ->where('id', $user->id)
                ->update(['RUT' => $formattedRut]);
        }
    }
}
