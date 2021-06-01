<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

class BoutiqueController extends Controller
{
    public function index(Request $request)
    {
        $length = $request->input('length');
        $orderBy = $request->input('column'); //Index
        $orderByDir = $request->input('dir', 'asc');
        $searchValue = $request->input('search');

        $query = Company::query()->eloquentQuery(null, null, $searchValue, [
            'city'
        ]);

        $byEmail = Company::query()->whereHas('email', function ($query) use ($searchValue) {
            $query->where('name', 'like', '%' . $searchValue . '%');
        })->eloquentQuery(null, null, null, [
            'city'
        ]);


        $query = $query->union($byEmail)->with('city', 'email')->orderBy($orderBy, $orderByDir);

        $data = $query->paginate($length);

        return new DataTableCollectionResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(Company $company)
    {
        return response()->json($company->load('products.measure', 'products.category', 'products.galleries'));
    }

    public function showItems(Company $company, Request $request)
    {
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

//        $byCategory = $items->eloquentQuery($orderBy, $orderByDir, '', [
//            "product",
//        ])->whereHas('product.category', function (Builder $query) use ($searchValue) {
//            if ($query->first()) {
//
//            }
//        });


        $items = $items->paginate($length);
        return new DataTableCollectionResource($items);

    }
}
