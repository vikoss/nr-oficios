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
use Illuminate\Support\Facades\Storage;

class NotificationController extends Controller
{
    /* public function store(NotificationRequest $notification)
    {
        // Primero subir al S3 el doc
        //
        $path = 'public/pdf/final.pdf';
        Storage::put($path, base64_decode($notification->document));
        $notification->document = $path;
        return Notification::create($notification->validated());
    } */

    public function notify(Notification $notification, Request $request)
    {
        NotifyDepartamentsByEmail::dispatch($notification);

        return response()->json(['message' => 'Notification enqueue successfully'], 202);
    }

    public function show(Notification $notification)
    {
        return $notification;
    }
}
