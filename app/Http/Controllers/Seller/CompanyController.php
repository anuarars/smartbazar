<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index(){
        $company = auth()->user()->company->first();

        return view('seller.company.index', compact('company'));
    }

    public function edit(){
        $company = auth()->user()->company->first();
        return view('seller.company.edit', compact('company'));
    }

    public function update(){
        $company = auth()->user()->company;

        $company->update([
            'name' => request()->name,
            'code' => request()->code,
            'phone' => request()->phone,
            'email' => request()->city,
            'street' => request()->street,
            'home' => request()->home,
            'unit' => request()->unit,
            'description' => request()->description,
        ]);

        return redirect()->route('seller.company.profile');
    }
}
