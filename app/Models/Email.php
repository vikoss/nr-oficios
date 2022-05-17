<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Email extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'to',
        'verified_at',
    ];

    public function getCreatedAtAttribute($date)
    {
        return (bool) $date ? Carbon::createFromDate($date)->format('Y-m-d H:i') : null;
    }

    public function getUpdatedAtAttribute($date)
    {
        return (bool) $date ? Carbon::createFromDate($date)->format('Y-m-d H:i') : null;
    }

    public function getVerifiedAtAttribute($date)
    {
        return (bool) $date ? Carbon::createFromDate($date)->format('Y-m-d H:i') : null;
    }

    public function getSentAtAttribute($date)
    {
        return (bool) $date ? Carbon::createFromDate($date)->format('Y-m-d H:i') : null;
    }

    /**
     * Get the notification associated with the email.
     */
    public function notification()
    {
        return $this->belongsTo(Notification::class);
    }
}
