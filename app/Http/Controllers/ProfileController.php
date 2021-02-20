<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;

class ProfileController extends Controller
{
    public function index(){
        return view('user.profile');
    }

    public function address(){
        return view('user.address');
    }

    public function addressUpdate(Request $request){
        $user = Auth::user();
        $data = [
            'city' => $request->city,
            'home' => $request->home,
            'unit' => $request->unit,
            'street' => $request->street,
            'postcode' => $request->postcode
        ];
        if($user->address){
            $user->address()->update($data);
        }else{
            $user->address()->create($data);
        }
        
        return back();
    }
}