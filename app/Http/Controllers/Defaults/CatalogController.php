<?php

namespace App\Http\Controllers\Defaults;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function index(Category $category = null)
    {
        $products = Product::has('items')->sortable();

        if ($category) {
            $products->whereIn('category_id', $category->getAllChildren()->pluck('id')->push($category));
        }

        $latest_products = Product::latest()->limit(5)->get();
        return view('catalog', compact( 'latest_products'))
            ->with('products', $products->paginate(12));
    }
}
