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
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserNotificationController extends Controller
{
    public function store(User $user, NotificationRequest $notification)
    {
        // Primero subir al S3 el doc
        //
        return $user->notifications()->create($notification->validated());
    }
}
