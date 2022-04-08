<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifiedDepartments extends Mailable
{
    use Queueable, SerializesModels;

    public $notification;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notification, $email, $user)
    {
        $this->notification = $notification;
        $this->email = $email;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("{$this->user->email}")->view('emails.notified')->subject("{$this->notification->name}");
    }
}
