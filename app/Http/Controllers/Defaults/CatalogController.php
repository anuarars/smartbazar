<?php

namespace App\Http\Controllers\Defaults;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index($category = null)
    {
        $products = Product::sortable();

        $categories = Category::with('children')->where('parent_id',0)->get();

        if ($category) {
            Product::whereIn('category_id', Category::find($category)->getAllChildren()->pluck('id')->push($category));
        }

        $latest_items = Item::latest()->limit(5)->get();
        return view('catalog', compact('categories', 'latest_items'))
            ->with('products', $products->paginate(12));
    }
}
