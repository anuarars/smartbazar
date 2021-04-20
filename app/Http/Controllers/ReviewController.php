<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;

class ReviewController extends Controller
{
    public function show(Request $request){
        return view('review');
    }

    public function store(Request $request){
        // return $request->all();
        $user_id = Auth::id();
        $review = Review::create([
            'item_id' => $request->item_id,
            'user_id' => $user_id,
            'description' => $request->description,
            'rate' => $request->rate,
            'order_id' => $request->order_id
        ]);
        return $review->id;
    }
}