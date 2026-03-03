<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Fetch current date
        $currentDate = now();

        // Retrieve past bookings with hotel name
        $pastBookings = DB::table('hotel_bookings')
            ->join('hotels', 'hotel_bookings.hotel_id', '=', 'hotels.id') // Join with hotels table
            ->where('hotel_bookings.user_id', $user->id)
            ->where('hotel_bookings.check_in_date', '<', $currentDate)
            ->select('hotel_bookings.*', 'hotels.name as hotel_name') // Select hotel name from the hotels table
            ->get();

        // Retrieve current bookings with hotel name
        $currentBookings = DB::table('hotel_bookings')
            ->join('hotels', 'hotel_bookings.hotel_id', '=', 'hotels.id') // Join with hotels table
            ->where('hotel_bookings.user_id', $user->id)
            ->where('hotel_bookings.check_in_date', '>=', $currentDate)
            ->select('hotel_bookings.*', 'hotels.name as hotel_name') // Select hotel name from the hotels table
            ->get();

        // Pass variables to the view
        return view('dashboard', [
            'user' => $user,
            'pastBookings' => $pastBookings,
            'currentBookings' => $currentBookings
        ]);
    }
    public function uploadProfileImage(Request $request)
    {
    // Validate the image
    $request->validate([
        'profile_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Store the image in the 'public' disk
    if ($request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')->store('profile_images', 'public');
        
        // Save the path to the database
        auth()->user()->update(['profile_image' => $imagePath]);
    }

    return back()->with('success', 'Profile image updated!');
    }
}
