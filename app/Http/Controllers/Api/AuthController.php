<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Pusher\PushNotifications\PushNotifications;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'reset']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['phone', 'password']);

        $token = auth()->guard('api')->attempt($credentials);

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function register(Request $request){
        
        $this->validate($request,[
            'firstname' => 'required|min:3|max:20',
            'lastname' => 'required|min:3|max:20',
            'phone' => 'required',
            'password' => 'required'
        ]);

        $removedSymbols = preg_replace("/[^a-zA-Z0-9\s]/", "", $request->phone);
        $phoneNumber = str_replace(' ', '', $removedSymbols);

        $phone_verify_code = rand(1000, 9999);
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'phone_verify_code' => $phone_verify_code
        ]);

        $client = new Client();
        $client->post('http://kazinfoteh.org:9507/api?action=sendmessage&username=smartbaza1&password=kJ6uViovf&recipient='.$phoneNumber.'&messagetype=SMS:TEXT&originator=SMARTBAZAR&messagedata=Код подтверждения для SMARTBAZAR.KZ: '.$user->phone_verify_code.'');

        $credentials = request(['phone', 'password']);

        $token = auth()->guard('api')->attempt($credentials);

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function verify(Request $request){
        $user = User::find(Auth::id());
        if($request->phone_verify_code == $user->phone_verify_code){
            $user->phone_verified_at = now();
            $user->save();
            return response()->json('verified', 200);
        }else{
            return response()->json('error', 406);
        }
    }

    public function resend(){
        $user = User::find(Auth::id());
        $user->phone_verify_code = rand(1000, 9999);
        $user->save();

        $removedSymbols = preg_replace("/[^a-zA-Z0-9\s]/", "", $user->phone);
        $phoneNumber = str_replace(' ', '', $removedSymbols);

        $client = new Client();
        $client->post('http://kazinfoteh.org:9507/api?action=sendmessage&username=smartbaza1&password=kJ6uViovf&recipient='.$phoneNumber.'&messagetype=SMS:TEXT&originator=SMARTBAZAR&messagedata=Код подтверждения для SMARTBAZAR.KZ: '.$user->phone_verify_code.'');

        return response()->json('sent', 200);
    }

    public function reset(Request $request){
        $password = rand(11111111,99999999);
        $user = User::where('phone', $request->phone)->get();
        if($user->count()==0){
            return response()->json('fail');
        }else{
            DB::table('users')->where('phone', $request->phone)->update([
                'password' => bcrypt($password)
            ]);
            $removedSymbols = preg_replace("/[^a-zA-Z0-9\s]/", "", $request->phone);
            $phoneNumber = str_replace(' ', '', $removedSymbols);

            $client = new Client();
            $client->post('http://kazinfoteh.org:9507/api?action=sendmessage&username=smartbaza1&password=kJ6uViovf&recipient='.$phoneNumber.'&messagetype=SMS:TEXT&originator=SMARTBAZAR&messagedata=Новый пароль для SMARTBAZAR.KZ: '.$password.'');
            return response()->json('success');
        }
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    public function beams(Request $request)
    {
        // $userId = $request->id;
        $userId = request('id');
        $id = "'".$userId."'";
        // return response()->json($userId);
        $beamsClient = new PushNotifications(array(
            "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
            "secretKey" => env('PUSHER_BEAMS_SECRET_KEY'),
        ));
          
        $beamsToken = $beamsClient->generateToken($id);
        return response()->json($beamsToken);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        // auth()->logout();
        auth()->guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in'   => 60,
        ]);
    }
}