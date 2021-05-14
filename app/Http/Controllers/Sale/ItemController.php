<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Item;
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

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $company_id = Auth::user()->company->id;
        return view('seller.item.index', compact('company_id'));
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
     * @return Response
     */
    public function store(ProductRequest $request)
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
            'isPublished' => $request->input('isPublished')
        ]);

        $product->save();

        if($request->hasFile('gallery')) {
            foreach ($request->gallery as $gallery_image) {

                $path = $gallery_image->store('images', 's3');
                Storage::disk('s3')->setVisibility($path, 'public');

                $gallery = new Gallery([
                    'image' => Storage::disk('s3')->url($path),
                    'product_id' => $product->id,
                    'user_id' => Auth::id()
                ]);

                $gallery->save();
            }
        }

        return redirect()->back()->with(['success' => 'Товар успешно добавлен']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function show(Item $item)
    {
        //Product::where('id', $product->id)->increment('views');
        $measures = Measure::all();
        $countries = Country::all();
        $brands = Brand::all();
        $categories = CategoryResource::collection(Category::with('children')->where('parent_id', 0)->get());
        return view('seller.item.show', compact('item', 'brands', 'countries', 'categories', 'measures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Item $item)
    {

        $updateRequest = $request->validate([
            'price'  => 'required',
            'count'  => 'required',
            'discount'  => 'required',
        ]);
        return $updateRequest;
        $item = $item->update($updateRequest);

        return redirect()->back()->with('item', $item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        foreach ($product->galleries as $gallery) {
            Storage::disk('s3')->delete($gallery->image);
            $gallery->delete();
        }

        return back()->with(['success' => 'Товар успешно удален']);
    }
}
