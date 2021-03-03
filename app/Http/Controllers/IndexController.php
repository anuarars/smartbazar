<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

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
        $product = product::where('id', $id)->first();
        $reviews = $product->reviews()->where('user_id', Auth::id())->paginate(3);
        $product->views += 1;
        $product->update([
            'views' => $product->views
        ]);
        return view('product', compact('product', 'reviews'));
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