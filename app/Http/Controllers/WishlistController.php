<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        $categories = Category::all();
        return view('wishlist', compact('wishlists', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->product_id){
            Wishlist::updateOrCreate([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id
            ],
            [
                'user_id' => Auth::id(),
                'product_id' => $request->product_id
            ]);
        }
    }

    public function count(){
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return $wishlist->count();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
