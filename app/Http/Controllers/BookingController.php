<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Flight;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Show Booking History
     */
    public function history()
    {
        // Fetch all bookings for the authenticated user
        $bookings = Booking::where('user_name', Auth::user()->name)->get();
        
        return view('booking.history', compact('bookings'));
    }

    /**
     * Confirm a Booking
     * 
     * @param int $flightId
     */
    public function confirm($flightId)
    {
        $flight = Flight::findOrFail($flightId);

        Booking::create([
            'flight_name' => $flight->flight_number,
            'user_name' => Auth::user()->name,
            'status' => 'confirmed',
        ]);

        return redirect()->route('booking.history')->with('success', 'Booking confirmed!');
    }

    /**
     * Cancel a Booking
     * 
     * @param int $bookingId
     */
    public function cancel($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        // Ensure only the owner can cancel
        if ($booking->user_name !== Auth::user()->name) {
            return redirect()->route('booking.history')->with('error', 'Unauthorized action.');
        }

        $booking->update(['status' => 'cancelled']);

        return redirect()->route('booking.history')->with('success', 'Booking cancelled!');
    }
}
