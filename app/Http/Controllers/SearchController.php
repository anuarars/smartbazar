<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function product(Request $request){
        $search = $request->searchInput;
        $products = Product::where('title', 'LIKE', "%{$search}%")->get()->take(10);
        return $products->load('galleries', 'brand');
    }
}