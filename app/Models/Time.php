<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = [
        'time'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class,  'time_id');
    }
}
