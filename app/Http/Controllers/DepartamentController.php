<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    public function index(Departament $departament)
    {
        return $departament->get();
    }
}
