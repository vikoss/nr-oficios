<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\Users;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Users::data() as $key => $user) {
            DB::table('users')->insert([
                'employee_number'   => $user[0],
                'name'              => $user[1],
                'first_surname'     => $user[2],
                'second_surname'    => $user[3],
                'dependency_desc'   => $user[4],
                'dependency'        => $user[5],
                'position'          => $user[6],
                'email'             => $user[7],
                'role'              => $user[8],
                'password'          => Hash::make($user[0]),
            ]);
        }
    }
}
