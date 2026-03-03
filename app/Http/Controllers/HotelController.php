<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel; 
use App\Models\Favorite;

class HotelController extends Controller
{
    public function index()
    {

        $hotels = Hotel::all();

        $favoriteHotels = Favorite::where('user_id', auth()->id())->pluck('hotel_id')->toArray();

        return view('hotels.index', compact('hotels', 'favoriteHotels'));
    }

    public function search(Request $request)
    {
        $query = Hotel::query();


        if ($request->filled('search')) {
            $search = $request->search;

            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('location', 'like', '%' . $search . '%');
        }

        $hotels = $query->get();


        $favoriteHotels = Favorite::where('user_id', auth()->id())->pluck('hotel_id')->toArray();

        return view('hotels.index', compact('hotels', 'favoriteHotels'));
    }
}
