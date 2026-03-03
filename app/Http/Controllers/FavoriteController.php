<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function toggle(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        $favorite = Favorite::where('user_id', auth()->id())
                            ->where('hotel_id', $request->hotel_id)
                            ->first();

        if ($favorite) {
            // Remove from favorites
            $favorite->delete();
            return redirect()->back()->with('success', 'Hotel removed from favorites!');
        } else {
            // Add to favorites
            Favorite::create([
                'user_id' => auth()->id(),
                'hotel_id' => $request->hotel_id,
            ]);
            return redirect()->back()->with('success', 'Hotel added to favorites!');
        }
    }
}
