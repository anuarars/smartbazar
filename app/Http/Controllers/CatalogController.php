<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;

class CatalogController extends Controller
{

    public function index(){
        // $categories = Category::where('parent_id', 0)->get();
        $latest_items = Item::orderBy('created_at')->limit(5)->get();
        dd($latest_items);
        // $items = Item::paginate(15);
        // return view('catalog', compact('latest_items', 'categories', 'items'));
    }

    public function indexFilters() {

        return \request()->all();
    }

}