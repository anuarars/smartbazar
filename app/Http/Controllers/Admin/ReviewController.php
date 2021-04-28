<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::with("user")->get();
        return view("admin.review.index", compact('reviews'));
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route("review.index");
    }
}