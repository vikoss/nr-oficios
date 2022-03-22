<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    /**
     * Get the phone associated with the user.
     */
    public function departament()
    {
        //return $this->hasOne(Departament::class);
        return $this->belongsTo(Departament::class);
    }
}
