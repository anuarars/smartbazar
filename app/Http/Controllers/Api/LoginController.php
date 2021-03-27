<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = [
            'phone' => $request->phone,
            'password' => $request->password,
         ];
 
         if(auth()->attempt($credentials)){
             $token = auth()->user()->createToken('smartbazarkz')->accessToken;
             return response()->json(['token' => $token], 200);
         }else{
             return response()->json(['error' => 'UnAuthorized'], 401);
         }
    }
}
