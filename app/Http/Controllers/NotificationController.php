<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NotificationRequest;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function store(NotificationRequest $notification)
    {
        // Primero subir al S3 el doc
        return Notification::create($notification->validated());
    }
}
