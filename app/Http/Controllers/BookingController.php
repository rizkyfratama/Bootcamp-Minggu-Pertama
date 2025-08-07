<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
{
    $bookings = \App\Models\Booking::all();
    return view('index', compact('bookings'));
}

public function create()
{
    return view('create');
}

public function store(Request $request)
{
    $request->validate([
        'room_name' => 'required',
        'user_name' => 'required',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
    ]);

    \App\Models\Booking::create($request->all());

    return redirect('/')->with('success', 'Booking berhasil ditambahkan.');
}

public function edit($id)
{
    $booking = \App\Models\Booking::findOrFail($id);
    return view('edit', compact('booking'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'room_name' => 'required',
        'user_name' => 'required',
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'status' => 'required|in:pending,approved,rejected',
    ]);

    $booking = \App\Models\Booking::findOrFail($id);
    $booking->update($request->all());

    return redirect('/')->with('success', 'Booking berhasil diupdate.');
}

public function destroy($id)
{
    $booking = \App\Models\Booking::findOrFail($id);
    $booking->delete();

    return redirect('/')->with('success', 'Booking berhasil dihapus.');
}

}
