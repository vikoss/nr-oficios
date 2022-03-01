<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NotificationRequest;
use App\Models\Notification;
use App\Mail\NotifiedDepartments;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Jobs\NotifyDepartamentsByEmail;

class NotificationController extends Controller
{
    public function store(NotificationRequest $notification)
    {
        // Primero subir al S3 el doc
        return Notification::create($notification->validated());
    }

    public function notify(Notification $notification, Request $request)
    {
        NotifyDepartamentsByEmail::dispatch($notification);

        return response()->json(['message' => 'Notification enqueue successfully'], 202);
    }
}
