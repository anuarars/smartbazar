<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Measure;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $products = Product::where('user_id', $user_id)->paginate(15);
        return view('seller.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $measures = Measure::all();
        $countries = Country::all();
        $brands = Brand::all();
        $categories = Category::all();
        $delimiter = "";
        return view('seller.product.create', compact('countries', 'brands', 'categories', 'measures','delimiter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $originalName = $request->image->getClientOriginalName();
            $filename = uniqid().'_'.$originalName;
            $filepath = "/storage/products/$filename";
            $request->image->storeAs('products', $filename);
        }
        
        $product = new Product([
            'user_id' => Auth::id(),
            'company_id' => Auth::user()->company_id,
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->brand_id,
            'country_id' => $request->country_id,
            'measure_id' => $request->input('measure_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'count' => $request->input('count'),
            'discount' => $request->input('discount'),
            'sku' => rand(100000,999999),
            'image' => $filepath
        ]);

        $product->save();

        if($request->hasFile('gallery')) {
            foreach ($request->gallery as $gallery_image) {
                $gallery_originalName = $gallery_image->getClientOriginalName();
                $gallery_filename = uniqid().'_'.$gallery_originalName;
                $gallery_filepath = "/storage/galleries/$gallery_filename";
                $gallery_image->storeAs('galleries', $gallery_filename);

                $gallery = new Gallery([
                    'image' => $gallery_filepath,
                    'product_id' => $product->id,
                    'user_id' => Auth::id()
                ]);

                $gallery->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //Product::where('id', $product->id)->increment('views');
        return view('seller.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
