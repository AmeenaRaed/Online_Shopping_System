<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;


class ReviewController extends Controller
{
    public function AllReviews()
    {
        return review::all();
    }

    public function AddReview(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        Review::create(array_merge($validated, [
            'user_id' => $user->id,
        ]));

        return redirect()->back()->with( 'success', 'Profile updated successfully.');

    }
    //
}
