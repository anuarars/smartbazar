<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(){
        $products = Product::all();

        if ($category = request('category')){
            $products->where('category_id', '=',1);
        }
        if ($filter = request('filter')) {
            $products->orderBy($filter);
        }
        if ($price = request('price')) {
            $products->whereBetween($price[0], $price[1]);
        }

        $categories = Category::where('parent_id', 0)->get();

        return view('catalog', compact('products', 'categories'));
    }



}
