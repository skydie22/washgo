<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'price'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'price_id');
    }
}
