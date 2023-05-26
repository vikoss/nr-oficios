<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return User::select(
            $request->get('fields')
            ? explode(',', $request->get('fields'))
            : '*'
        )->paginate(
            $request->get('per_page')
            ? $request->get('per_page')
            : User::count()
        );
    }

    public function inbox(User $user)
    {
        return $user->inbox()->orderBy('id', 'desc')->paginate();
    }

    public function store(Request $request)
    {
        //return $request->rol_id;
        $role = Role::find($request->role_id);
        //return $role;
        $employee = Employee::create($request->all());
        $request['employee_id'] = $employee->id;
        $request['role_id'] = $role->id;
        $request['password'] = bcrypt($request->password);
        $user = User::create($request->all());
        return $user;
    }
}
