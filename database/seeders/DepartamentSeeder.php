<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Users;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Users::departaments() as $key => $departament) {
            DB::table('departaments')->insert([
                'name'          => $departament,
                'direction_id'  => 1,
            ]);
        }
    }
}
