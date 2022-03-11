<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function show(Email $email)
    {
        return $email;
    }

    public function update(Email $email, Request $request)
    {
        return $email->update($request->all());
    }
}
