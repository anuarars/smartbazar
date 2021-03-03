<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class CatalogController extends Controller
{

    public function index(){
        $categories = Category::where('parent_id', 0)->get();
        $latest_products = Product::orderBy('created_at')->take(5)->get();
        $products = Product::paginate(15);
        return view('catalog', compact('latest_products', 'categories', 'products'));
    }

    public function indexFilters() {

        return \request()->all();
    }

}
