<?php

namespace App\Jobs;

use App\Models\Notification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use App\Mail\NotifiedDepartments;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class NotifyDepartamentsByEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $notification;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::find($this->notification->user_id);
        $this->notification->emails()->whereNull('sent_at')->get()->each(function ($email, $key) use ($user) {
            Mail::to($email->to)->send(new NotifiedDepartments($this->notification, $email, $user));
            $email->sent_at = Carbon::now();
            $email->save();
        });
    }
}
