<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function reviews()
    {
        $reviews = Review::paginate(5);
        return view('main.reviews', (compact('reviews')));
    }
    public function getReviews(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|min:3|max:25',
            'message' =>'required|min:3|max:255',
        ]);
        $review = new Review();
        $review->name = $request->name;
        $review->review = $request->message;
        $review->save();
        return back()->with('success', 'Thank you for Review');
    }
    
}
