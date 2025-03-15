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
        'price_id',
        'address',
        'status'
    ];

    public function time()
    {
        return $this->belongsTo(Time::class , 'time_id');
    }

    public function price()
    {
        return $this->belongsTo(Price::class, 'price_id');
    }

    public static function getRegions()
    {
        return ['jakarta pusat', 'jakarta utara', 'jakarta barat', 'jakarta selatan', 'jakarta timur', 'bekasi selatan', 'bekasi barat', 'bekasi timur'];
    }
}
