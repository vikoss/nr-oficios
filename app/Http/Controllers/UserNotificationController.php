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
    public function index(User $user)
    {
        return $user->notifications()->orderBy('id', 'desc')->paginate();
    }

    public function store(User $user, NotificationRequest $notification)
    {
        return $user->notifications()->create($notification->validated());
    }
}
