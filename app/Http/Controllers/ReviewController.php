<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;


class ReviewController extends Controller
{
    // public function ShowReviews()
    // {
    //     return review::all();
    // }

   public function AddReview(Request $request, $id)
{

    $user = Auth::user();
    $validated = $request->validate([
        'product_id' => 'required|exists:products,id',
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:500',
    ]);

    Review::create([
        'user_id' => $user->id,
        'product_id' => $id, // Use the route ID
        'rating' => $request->rating,
        'comment' => $request->comment,
    ]);

    return redirect()->back()->with('success', 'Review added successfully.');
}
    //
}
