<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Pusher\PushNotifications\PushNotifications;

class ProductController extends Controller
{
    public function index(){
        $products = DB::table('products')->get();
        return response()->json($products);
    }

    public function productsByCategory($category_id){
        $products = Product::where('category_id', $category_id)->get();
        return response()->json($products);
    }
}