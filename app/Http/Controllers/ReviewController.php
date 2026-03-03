<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        // Fetch reviews (filter by search query if provided)
        $reviews = Review::when($search, function ($query, $search) {
            return $query->where('review_for', 'LIKE', "%$search%");
        })->latest()->get();

        return view('reviews.index', compact('reviews', 'search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reviewer' => 'required|string|max:255',
            'review_for' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        Review::create($request->all());

        return redirect()->route('reviews.index')->with('success', 'Review added successfully!');
    }
}
