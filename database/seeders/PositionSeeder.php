<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Users;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Users::positions() as $key => $position) {
            DB::table('positions')->insert([
                'name'              => $position,
                'departament_id'    => 1,
            ]);
        }
    }
}
