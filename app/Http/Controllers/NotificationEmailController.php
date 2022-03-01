<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationEmailController extends Controller
{
    public function store(Notification $notification, Request $request)
    {
        // Add validation of request
        /* $data = $request->validate([
            "name"    => "required|array|min:3",
            "name.*"  => "required|string|distinct|min:3",
        ]); */

        return $notification->emails()->createMany($request->all());
    }
}
