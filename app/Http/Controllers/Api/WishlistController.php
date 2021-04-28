<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
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
        $wishlists = Wishlist::where('user_id', Auth::id())->with('item.product.galleries')->get();
        return response()->json($wishlists);
    }

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
        return response()->json($wishlist->count());
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
        return response()->json(['succesfully removed']);
    }

    public function unlike(Item $item){
        Wishlist::where('item_id', $item->id)->where('user_id', Auth::id())->delete();
        return response('Successfully deleted', 204);
    }
}