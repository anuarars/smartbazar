<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\PushNotifications\PushNotifications;
use App\Models\{Category, Order, Product, Rating, Item};
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $itemsDiscount = Item::where('discount', '!=', 'null')->orderBy('created_at', 'desc')->limit(10)
            ->get();
        // $popular = Product::
        $categories = Category::with('children')->where('parent_id', '0')->get();
        return view('index', compact('itemsDiscount', 'categories'));
    }

    public function item($id = null){
        $item = Item::where('id', $id)->with('product.measure', 'product.galleries')->first();// находим товар
        // $reviews = $product->reviews()->paginate(3);// отзывы товара
        $item->views += 1;//добавляем просмотр
        $item->update([
            'views' => $item->views
        ]);

        $company_items = Item::where('company_id', $item->company_id)->inRandomOrder()->limit(10)->get();
        // $cat_products = Item::where('category_id', $product->category_id)->orderBy('views', 'desc')->get()->take(10);

        return view('item', compact('item', 'company_items'));
    }

    public function product($id = null){
        $product = Product::find($id);
        return view('product', compact('product'));
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