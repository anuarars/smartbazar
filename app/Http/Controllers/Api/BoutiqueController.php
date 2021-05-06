<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\CompanyResourceCollection;
use Illuminate\Http\Request;
use App\Models\Product;
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
        $query = Company::eloquentQuery($orderBy, $orderByDir, $searchValue);
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
}
