<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function update(Request $request, Email $email)
    {
        $email->update($request->all());
    }
}
