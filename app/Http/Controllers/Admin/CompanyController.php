<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('admin.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $company = Company::create($request->except('email', 'address'));

        $company->email()->create([
            'name' => $request->email
        ]);
        $company->address()->create([
            'description' => $request->address
        ]);

        if ($request->hasFile('image')) {
            $path = $request->image->store('images', 's3');

            Storage::disk('s3')->setVisibility($path, 'public');
            $company->update([
                'image' => Storage::disk('s3')->url($path),
            ]);
        }


        return redirect()->route('admin.company.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Application|Factory|Response|View
     */
    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Company $company, Request $request)
    {
        $company->update([
            'name' => $request->name,
            // 'code' => $request->code,
            'phone' => $request->phone,
            'description' => $request->description,
            'bin' => $request->bin
        ]);

        if ($company->email) {
            $company->email()->update([
                'name' => $request->email
            ]);
        } else {
            $company->email()->create([
                'name' => $request->email
            ]);
        }

        if ($request->hasFile('image')) {
            $path = $request->image->store('images', 's3');

            Storage::disk('s3')->setVisibility($path, 'public');
            $company->update([
                'image' => Storage::disk('s3')->url($path),
            ]);
        }

        return redirect()->route('admin.company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('admin.company.index');
    }
}
