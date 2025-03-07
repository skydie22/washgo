<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Time;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $times = Time::all();
        return view('user_form.index', compact('times'));
    }

    public function availableTimes(Request $request)
    {
        $date = $request->query('date');

        if (!$date) {
            return response()->json([]);
        }

        // Ambil semua jam yang belum dibooking pada tanggal yang dipilih
        $bookedTimes = Booking::where('date', $date)->pluck('time_id');
        $availableTimes = Time::whereNotIn('id', $bookedTimes)->get();

        return response()->json($availableTimes);
    }

    // public function refresh()
    // {
    //     $bookings = Booking::with('time')->latest()->get();

    //     return response()->json($bookings->map(function ($booking) {
    //         return [
    //             'id' => $booking->id,
    //             'name' => $booking->name,
    //             'email' => $booking->email,
    //             'phone' => $booking->phone,
    //             'date' => $booking->date,
    //             'time' => $booking->time->time,
    //             'address' => $booking->address,
    //             'region' => $booking->region,
    //         ];
    //     }));

    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => ['required', 'string', 'regex:/^\+62[0-9]{9,13}$/'],
            'date' => 'required|date',
            'region' => 'required|in:jakarta pusat,jakarta utara,jakarta barat,jakarta selatan,jakarta timur,bekasi selatan,bekasi barat,bekasi timur',
            'time_id' => [
                'required',
                'exists:times,id',
                function ($attribute, $value, $fail) use ($request) {
                    $isBooked = Booking::where('date', $request->date)
                        ->where('time_id', $value)
                        ->exists();
                    if ($isBooked) {
                        $fail('Jam ini sudah dibooking, silakan pilih jam lain.');
                    }
                }
            ],
            'address' => 'required|string',
        ]);

        $bookings = Booking::create($validatedData);

        return redirect()->route('user.form')->with('success', 'Booking berhasil, silahkan menunggu pesan whatsapp untuk konfirmasi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
