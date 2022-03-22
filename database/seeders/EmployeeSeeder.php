<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Users;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Users::data() as $key => $data) {
            $position_id = DB::table('positions')->select('id')->where('name', $data[4])->get();
            echo "{$position_id[0]->id} - {$key}\n";
            Employee::create([
                'employee_number'   => $data[0],
                'name'              => $data[1],
                'first_surname'     => $data[2],
                'second_surname'    => $data[3],
                'position_id'       => $position_id[0]->id,
            ]);
        }
    }
}
