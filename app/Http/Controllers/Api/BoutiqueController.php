<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

class BoutiqueController extends Controller
{
    public function index(Request $request)
    {
        $length = $request->input('length');
        $orderBy = $request->input('column'); //Index
        $orderByDir = $request->input('dir', 'asc');
        $searchValue = $request->input('search');
        DB::connection()->enableQueryLog();

        $query = Company::query();



        $data = $query->paginate($length);

        return new DataTableCollectionResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Company $company)
    {
        return response()->json($company->load('products.measure', 'products.category', 'products.galleries'));
    }

    public function showItems(Company $company, Request $request)
    {
        DB::connection()->enableQueryLog();

        $items = $company->items()->with('product.measure', 'product.category', 'product.galleries', 'company');
        $length = $request->input('length');
        $orderBy = $request->input('column'); //Index
        $orderByDir = $request->input('dir', 'asc');
        $searchValue = $request->input('search');

        $items = $items->eloquentQuery($orderBy, $orderByDir, $searchValue, [
            [
                "product",
            ]
        ]);

//        $items->whereHas('product.category', function (Builder $query) use($searchValue) {
//            if ($query->first()) {
//
//            }
//        });


        $items = $items->paginate($length);
        return new DataTableCollectionResource($items);

    }
}
