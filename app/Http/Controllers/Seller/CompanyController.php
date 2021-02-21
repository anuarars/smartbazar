<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Weekday;
use App\Models\Worktime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function index(){
        $company = auth()->user()->company->first();
        $weekdays = Weekday::all();

        return view('seller.company.index', compact('company','weekdays'));
    }

    public function update(Request $request){
        $company = auth()->user()->company;

        $company->update([
            'name' => $request->name,
            'code' => $request->code,
            'phone' => $request->phone,
            'description' => $request->description,
        ]);

        if($company->email){
            $company->email()->update([
                'name' => $request->email
            ]);
        }else{
            $company->email()->create([
                'name' => $request->email
            ]);
        }

        return redirect()->route('seller.company.profile');
    }

    public function addressUpdate(Request $request){
        $company = Auth::user()->company;
        $data = [
            'city' => $request->city,
            'home' => $request->home,
            'unit' => $request->unit,
            'street' => $request->street,
            'postcode' => $request->postcode
        ];
        if($company->address){
            $company->address()->update($data);
        }else{
            $company->address()->create($data);
        }

        return back();
    }

    public function worktime(Request $request){
        $data = $request->except('_token');
        foreach ($data as $key => $value){
            Worktime::updateOrCreate([
                'company_id' => Auth::user()->company->id,
                'weekday_id' => $key,
            ],
            [
                'company_id' => Auth::user()->company->id,
                'weekday_id' => $key,
                'start_time' => $value['start_time'][0],
                'end_time' => $value['end_time'][0]
            ]);
        }

        return back();
    }

    public function edit(){
        $company = auth()->user()->company->first();
        return view('seller.company.edit', compact('company'));
    }
}
