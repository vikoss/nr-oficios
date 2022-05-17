<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['document', 'name'];

    /**
     * Get the emails for the notification.
     */
    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    /**
     * Get the user associated with the notification.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return  Carbon::createFromDate($date)->format('Y-m-d H:i');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromDate($date)->format('Y-m-d H:i');
    }
}
