<?php

namespace App\Http\Controllers\Packer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\PushNotifications\PushNotifications;
use Illuminate\Support\Facades\DB;

class PackerController extends Controller
{
    public function index(){
        return view('packer.index');
    }

    public function available(){
        $orders = Order::where('status_id', 2)->get();
        return $orders;
    }

    public function accept(){
        $order_id = request()->input('order_id');
        return redirect()->route('packer.order', [$order_id])->with(['success'=>'Заказ успешно принят']);
    }

    public function order($id){
        if($order = Order::where('id', $id)->where('isFinished', 0)->first()){
            DB::table('orders')
            ->where('id', $id)
            ->update([
                'status_id' => 3,
                'packer_id' => Auth::id()
            ]);

            $userId = "'".$order->user->id."'";

            $beamsClient = new PushNotifications(array(
                "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
                "secretKey" => env('PUSHER_BEAMS_SECRET_KEY'),
            ));
            $publishResponse = $beamsClient->publishToUsers(
                [$userId],//Buyer Id
                [
                    "web" => [
                        "notification" => [
                            "title" => "Фасовка",
                            "body" => "Ваши товары фасуются",
                            'icon' => secure_asset('/img/logo/push.png'),
                            "deep_link" => env('APP_URL').'home'
                        ]
                        ],
                    "fcm" => [
                        "notification" => [
                            "title" => "Фасовка",
                            "body" => "Ваши товары фасуются",
                            'icon' => secure_asset('/img/logo/push.png'),
                            "deep_link" => env('APP_URL').'home'
                        ]
                    ]
                ]
            );

            return view('packer.order', compact('order'));
        }
        return redirect()->route('delivery.index')->with(['error'=>'Данного заказа не существует']);
    }
}