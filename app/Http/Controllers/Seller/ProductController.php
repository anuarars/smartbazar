<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Traits\StoreImageTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Measure;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    use StoreImageTrait;

    static $GALLERIES_DIR = "galleries/product";
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
     * @return Response
     */
    public function create()
    {
        $measures = Measure::all();
        $countries = Country::all();
        $brands = Brand::all();
        $categories = CategoryResource::collection(Category::with('children')->where('parent_id', 0)->get());
        return view('seller.product.create', compact('countries', 'brands', 'categories', 'measures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
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
        ]);
        $product->save();

        Gallery::insert($this->imageArray(
            static::$GALLERIES_DIR,
            json_decode($request->galleries, true),
            $product)
        );



        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function show(Product $product)
    {
        //Product::where('id', $product->id)->increment('views');
        $measures = Measure::all();
        $countries = Country::all();
        $brands = Brand::all();
        $categories = CategoryResource::collection(Category::with('children')->where('parent_id', 0)->get());
        $galleries = $product->galleries()->pluck('image');
        return view('seller.product.show', compact('product', 'brands', 'countries', 'categories', 'galleries', 'measures'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Product $product)
    {
        $request = $request->validate([
            'category_id'  => 'required',
            'brand_id'  => 'required',
            'country_id'  => 'required',
            'measure_id'  => 'required',
            'title'  => 'required',
            'description'  => 'required',
            'price'  => 'required',
            'count'  => 'required',
            'discount'  => 'required',
        ]);
        $product = $product->update($request);


        return redirect()->back()->with('product', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Storage::deleteDirectory(ProductController::$DIR . $id);
    }
}
