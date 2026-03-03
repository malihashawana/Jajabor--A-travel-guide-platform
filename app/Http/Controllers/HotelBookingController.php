<?php
namespace App\Http\Controllers;


use App\Models\HotelBooking;
use App\Models\Hotel;
use Illuminate\Http\Request;


class HotelBookingController extends Controller
{
    // Store the booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'number_of_guests' => 'required|integer|min:1',
            'room_type' => 'required|string', // Changed field to match "room_type"
        ]);


        HotelBooking::create([
            'user_id' => auth()->id(),
            'hotel_id' => $validated['hotel_id'],
            'check_in_date' => $validated['check_in_date'],
            'check_out_date' => $validated['check_out_date'],
            'number_of_guests' => $validated['number_of_guests'],
            'bedroom_type' => $validated['room_type'], // Save as bedroom_type
        ]);


        return redirect()->route('hotels.index')->with('success', 'Your hotel is booked successfully!');
    }


    // Show booking form for a specific hotel
    public function create($id)
    {
        $hotel = Hotel::findOrFail($id); // Fetch all hotels
        return view('hotelbookings.create', compact('hotel'));
    }







    // Show booking history
    public function history()
    {
        $user_id = auth()->id(); // Get the logged-in user's ID
   
        // Fetch bookings of the logged-in user with the related hotel name
        $bookings = HotelBooking::where('user_id', $user_id)
            ->with('hotel') // Eager load the hotel relation
            ->get();
   
        return view('history.index', compact('bookings'));
    }


    // Cancel a booking
    public function cancel($id)
    {
        // Find the booking by its ID
        $booking = HotelBooking::find($id);
   
        // Check if the booking exists
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }
   
        // Delete the booking
        $booking->delete();
   
        // Redirect with a success message
        return redirect()->back()->with('success', 'Booking canceled successfully.');
    }
}
