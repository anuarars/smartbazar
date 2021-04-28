<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Company;

class BoutiqueController extends Controller
{
    public function index()
    {
        $companies = Company::get();
        return response()->json($companies->load('products.measure', 'products.category', 'products.galleries'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return response()->json($company->load('products.measure', 'products.category', 'products.galleries'));
    }
}