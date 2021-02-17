<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function product(Request $request){
        $search = $request->searchInput;
        $products = Product::where('title', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%")->get();
        return $products;
    }
}