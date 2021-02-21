<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(){
        return view('user.profile');
    }

    public function address(){
        return view('user.address');
    }

    public function info(){
        return view('user.info');
    }

    public function infoUpdate(Request $request){
        $user = User::find(Auth::id());
        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'login' => $request->login,
            'phone' => $request->phone
        ]);
        
        return redirect()->route('profile.index');
    }

    public function addressUpdate(Request $request){
        $user = User::find(Auth::id());
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
        
        return redirect()->route('profile.index');
    }
}