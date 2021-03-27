<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Category, Order, Product, Rating};

class IndexController extends Controller
{
    public function index(){
        $products = Product::where('discount', '!=', 'null')
            ->orderBy('discount', 'asc')
            ->get()
            // ->sortByDesc('discountPercent')
            ->take(6);
        $categories = Category::with('children')->where('parent_id', '0')->get();
        return view('index', compact('products', 'categories'));
    }

    public function product($id = null){
        // $rating = Rating::where('user_id', Auth::id())->where('product_id', $id)->get();
        // return $rating;
        $product = Product::where('id', $id)->first();
        $reviews = $product->reviews()->paginate(3);
        $product->views += 1;
        $product->update([
            'views' => $product->views
        ]);

        $cat_products = Product::where('category_id', $product->category_id)->orderBy('views', 'desc')->get()->take(10);
        return view('product', compact('product', 'reviews', 'cat_products'));
    }

    public function add_rate(Request $request){
        $product_id = $request->product_id;
        $rate = $request->rate;
        $user_id = Auth::id();

        $rating = Rating::where('product_id', $product_id)->where('user_id', $user_id)->get()->first();
        if(empty($rating)){
            Rating::create([
                'product_id' => $product_id,
                'user_id' => $user_id,
                'rate' => $rate
            ]);
        }
    }
}