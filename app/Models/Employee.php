<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * Get the phone associated with the user.
     */
    public function user()
    {
        //return $this->hasOne(Employee::class);
        return $this->belongsTo(User::class);
    }

    /**
     * Get the phone associated with the user.
     */
    public function position()
    {
        //return $this->hasOne(Position::class);
        return $this->belongsTo(User::class);
    }
}
