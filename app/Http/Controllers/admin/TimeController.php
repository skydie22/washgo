<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $times = Time::all();
        return view('admin.schedule.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'time' => 'required|date_format:H:i|unique:times,time',
        ]);

        Time::create(['time' => $request->time]);

        return redirect()->back()->with('success', 'Waktu booking berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Time $time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Time $time)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Time $time)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Time $time, $id)
    {
        Time::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Waktu booking berhasil dihapus!');
    }
}
