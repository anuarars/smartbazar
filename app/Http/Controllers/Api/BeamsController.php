<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Pusher\PushNotifications\PushNotifications;

class BeamsController extends Controller
{
    public function index(){
        // $userId = json(auth()->user());
        // return response()->json(auth()->user());
        // $id = settype($userId, "string");

        // $beamsClient = new PushNotifications(array(
        //     "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
        //     "secretKey" => env('PUSHER_BEAMS_SECRET_KEY'),
        // ));
          
        // $beamsToken = $beamsClient->generateToken($id);
        // return response()->json($beamsToken);
    }
}

// Route::middleware('auth:api')->get('/pusher/beams-auth', function (Request $request) {
//     $userID = $request->user()->id; // If you use a different auth system, do your checks here
//     $userIDInQueryParam = Input::get('user_id');

//     if ($userID != $userIDInQueryParam) {
//         return response('Inconsistent request', 401);
//     } else {
//         $beamsToken = $beamsClient->generateToken($userID);
//         return response()->json($beamsToken);
//     }
// });