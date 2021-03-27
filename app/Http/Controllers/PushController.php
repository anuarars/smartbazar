<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\PushNotifications\PushNotifications;

class PushController extends Controller
{
    public function tokenProvider(){
        $userId = Auth::id();
        $id = "'".$userId."'";
        // return response()->json($userId);
        $beamsClient = new PushNotifications(array(
            "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
            "secretKey" => env('PUSHER_BEAMS_SECRET_KEY'),
        ));
          
        $beamsToken = $beamsClient->generateToken($id);
        return response()->json($beamsToken);
    }

    public function getUserId(Request $request){
        return "asdas";
        // $phone = request()->all();
        // $user = DB::table('users')->where('phone', $phone)->get();
        // return response()->json($phone);
        // return $user->id;
    }
}
