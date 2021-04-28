<?php

namespace App\Http\Controllers;

use App\Models\{Category, Wishlist, Item};
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
        // $wishlists = Wishlist::where('user_id', Auth::id())->with('product.company')->get();
        $categories = Category::all();
        return view('wishlist', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Item $item)
    {
        if($item){
            Wishlist::updateOrCreate([
                'user_id' => Auth::id(),
                'item_id' => $item->id
            ],
            [
                'user_id' => Auth::id(),
                'item_id' => $item->id
            ]);
        }
        return response('Successfully stored', 204);
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
    public function unlike(Item $item)
    {
        Wishlist::where('item_id', $item->id)->where('user_id', Auth::id())->delete();
        return response('Successfully deleted', 204);
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
    }

    public function getData(){
        $wishlists = Wishlist::where('user_id', Auth::id())->with('item.product.galleries')->get();
        return $wishlists;
    }
}
