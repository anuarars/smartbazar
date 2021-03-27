<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request){
        
        $this->validate($request,[
            'firstname' => 'required|min:3|max:20',
            'lastname' => 'required|min:3|max:20',
            'phone' => 'required',
            'password' => 'required'
        ]);

        $phone_verify_code = rand(1000, 9999);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'phone_verify_code' => $phone_verify_code
        ]);

        $token = $user->createToken('smartbazarkz')->accessToken;

        return response()->json(['token' => $token], 200);

    }
}
