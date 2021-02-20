<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesCollection;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(){
        $products = Product::sortable();
        $brands = Brand::all();

        if ($category = request('category')) {
            $products->where('category_id', '=', 1);
        }
        if ($price = request('priceList')) {
            $products = $products->whereBetween('price', [$price[0], $price[1]]);

//            $products->filter(function ($item) use($price) {
//                return $item->discountPercent >= $price[0] && $item->discountPercent <= $price[1];
//            });
        }
        if ($brand_filter = \request('brand_filter')) {
            $brandList = $brands->filter(function ($item) use($brand_filter) {
                return false !== stripos($item->title, $brand_filter);
            })->pluck('id');
        }
        if ($brandList = \request('brandsList')) {
            $products->whereIn('brand_id', $brandList);
        }

        $categories = new CategoriesCollection(Category::where('parent_id', 0)->get());

        return view('catalog', compact('categories', 'brandList', 'brands', 'price', 'brand_filter'))
            ->with('products', $products->paginate(12));
    }

    public function indexFilters() {

        return \request()->all();
    }

}
