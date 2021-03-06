<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class PhoneVerificationController extends Controller
{
    public function index(){
        if(Auth::user()->phone_verified_at === null){
            return view('auth.phone');
        }else{
            return redirect()->home();
        }
    }

    public function code(Request $request){
        $user = User::find(Auth::id());
        if($request->phone_verify_code == $user->phone_verify_code){
            $user->phone_verified_at = now();
            $user->save();
            return redirect()->home();
        }else{
            return redirect()->back()->with(['error' => 'Введенный вами пароль не совпадает']);
        }
    }

    public function resend(Request $request){
        $user = User::find(Auth::id());
        $user->phone_verify_code = rand(1000, 9999);
        $user->save();

        $removedSymbols = preg_replace("/[^a-zA-Z0-9\s]/", "", $user->phone);
        $phoneNumber = str_replace(' ', '', $removedSymbols);

        $client = new Client();
        $client->post('http://kazinfoteh.org:9507/api?action=sendmessage&username=smartbaza1&password=kJ6uViovf&recipient='.$phoneNumber.'&messagetype=SMS:TEXT&originator=SMARTBAZAR&messagedata=Код подтверждения для SMARTBAZAR.KZ: '.$user->phone_verify_code.'');

        return redirect()->back()->with(['success' => 'Пароль отправлен заново']);
    }

    public function reset(Request $request){
        $password = rand(11111111,99999999);
        $user = User::where('phone', $request->phone)->get();
        if($user->count()==0){
            return redirect()->back()->with(['error' => 'Введенный вами номер не найден']);
        }else{
            DB::table('users')->where('phone', $request->phone)->update([
                'password' => bcrypt($password)
            ]);
            $removedSymbols = preg_replace("/[^a-zA-Z0-9\s]/", "", $request->phone);
            $phoneNumber = str_replace(' ', '', $removedSymbols);
    
            $client = new Client();
            $client->post('http://kazinfoteh.org:9507/api?action=sendmessage&username=smartbaza1&password=kJ6uViovf&recipient='.$phoneNumber.'&messagetype=SMS:TEXT&originator=SMARTBAZAR&messagedata=Новый пароль для SMARTBAZAR.KZ: '.$password.'');
            return redirect()->back()->with(['success' => 'Пароль отправлен на ваш номер']);
        }
    }
}
