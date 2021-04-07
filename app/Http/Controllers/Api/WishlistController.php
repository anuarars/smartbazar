<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(){
        $wishlists = Wishlist::where('user_id', Auth::id())->with('product.company', 'product.galleries')->get();
        return response()->json($wishlists);
    }

    public function store(Product $product)
    {
        Wishlist::updateOrCreate([
            'user_id' =>auth()->id(),
            'product_id' => $product->id
        ],
        [
            'user_id' => auth()->id(),
            'product_id' => $product->id
        ]);
        return response()->json(['succesfully added']);
    }

    public function count(){
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return response()->json($wishlist->count());
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return response()->json(['succesfully removed']);
    }

}