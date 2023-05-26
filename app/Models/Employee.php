<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_surname',
        'second_surname',
        'employee_number',
        'position_id'
    ];

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
        return $this->belongsTo(Position::class);
    }
}
