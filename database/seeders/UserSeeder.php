<?php

namespace Database\Seeders;

use App\Models\Departament;
use App\Models\Position;
use App\Models\User;
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
        foreach (Users::data() as $key => $data) {
            # employe_number    name    first_surname   second_surname  direction   departaments    email   rol
            #      1              2           3                4           5             6            7      8

            $role_id = DB::table('roles')->select('id')->where('name', $data[8])->get();
            $employee_id = DB::table('employees')->select('id')->where('employee_number', $data[0])->get();
            $departament_id = DB::table('departaments')->select('id')->where('name', $data[6])->get();
            $direction_id = DB::table('directions')->select('id')->where('name', $data[5])->get();
            $position_id = DB::table('positions')->select('id')->where('name', $data[4])->get();

            $user = new User;
            $user->nick_name     = "{$data[1]} {$data[2]}";
            $user->email         = $data[7];
            $user->password      = Hash::make($data[0]);
            $user->role_id       = $role_id[0]->id;
            $user->employee_id   = $employee_id[0]->id;
            $user->save();

            $position = Position::find($position_id[0]->id);
            $position->departament_id = $departament_id[0]->id;
            $position->save();

            $departament = Departament::find($departament_id[0]->id);
            $departament->direction_id = $direction_id[0]->id;
            $departament->save();
        }
    }
}
