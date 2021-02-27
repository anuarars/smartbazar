<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
        // $wishlists = Wishlist::where('user_id', Auth::id())->with('product.company')->get();
        $categories = Category::all();
        return view('wishlist', compact('categories'));
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

    /**
     * Добавление или обновление с помощью product id чтобы не делать лишний запрос
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function store2(Product $product)
    {
        if($product){
            Wishlist::updateOrCreate([
                'user_id' => Auth::id(),
                'product_id' => $product->id
            ],
            [
                'user_id' => Auth::id(),
                'product_id' => $product->id
            ]);
        }
        return response('Successfully stored', 204);
    }

    /**
     * Удаление по product id чтобы не делать лишний запрос
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy2(Product $product)
    {
        $product->wishlist()->first()->delete();
        return response('Successfully deleted', 204);
    }


    public function count(){
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return $wishlist->count();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Wishlist $wishlist
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();
    }

    public function getData(){
        $wishlists = Wishlist::where('user_id', Auth::id())->with('product.company')->get();
        return $wishlists;
    }
}
