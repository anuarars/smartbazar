<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryByParent($parent_id){
        $categories = Category::where('parent_id', $parent_id)->get();
        return response()->json($categories);
    }
}