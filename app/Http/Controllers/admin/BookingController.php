<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookingsorder = Booking::with('time')->orderBy('date', 'asc')->get();
        return view('admin.bookings.index', compact('bookingsorder'));
    }


}
