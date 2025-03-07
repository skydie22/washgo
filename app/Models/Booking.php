<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'region',
        'time_id',
        'address'
    ];

    public function time()
    {
        return $this->belongsTo(Time::class , 'time_id');
    }
}
