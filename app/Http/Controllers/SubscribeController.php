<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function store(Request $request){
        $subscribe = Subscribe::where('email', $request->email)->get();
        if(count($subscribe)==0){
            Subscribe::create([
                'email' => $request->email
            ]);
            return response()->json('created');
        }else{
            return response()->json('exist');
        }
    }
}