<?php

namespace App\Http\Controllers;

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
}
