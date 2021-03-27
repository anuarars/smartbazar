<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Events\PackerEvent;
use App\Events\SaleEvent;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Pusher\PushNotifications\PushNotifications;

class CheckoutController extends Controller
{
    public function show($orderId){
        $order = Order::find($orderId);
        $sum = 0;
        foreach ($order->products as $product) {
            $sum += $product->price * $product->pivot->count;
        }
        return view('checkout.index', compact('order', 'sum'));
    }

    public function success($orderId){
        $order = Order::where('id', $orderId)->with('status')->first();
        DB::table('orders')
            ->where('id', $orderId)
            ->update(['status_id' => 2]);

        event(new PackerEvent($order));
        event(new SaleEvent($order));

        // foreach ($order->products as $product) {
//send notification to each boutique
        // }


        // PACKERS ARRAY PREPARE TO SEND
        $userIds = Role::find(3)->users()->pluck('user_id');
        foreach($userIds as $id) {
            $sendId = "'".$id."'";
            $packageUsers[] = $sendId;
        }

        $beamsClient = new PushNotifications(array(
            "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
            "secretKey" => env('PUSHER_BEAMS_SECRET_KEY'),
        ));
        $publishResponse = $beamsClient->publishToUsers(
            $packageUsers,//packers Ids
            [
                "web" => [
                    "notification" => [
                        "title" => "Заказ",
                        "body" => "Новая Фасовка",
                        'icon' => secure_asset('/img/logo/push.png'),
                        "deep_link" => env('APP_URL').'packer'
                    ]
                ],
                "fcm" => [
                    "notification" => [
                        "title" => "Заказ",
                        "body" => "Новая Фасовка",
                        'icon' => secure_asset('/img/logo/push.png'),
                        "deep_link" => env('APP_URL').'packer'
                    ]
                ]
            ]
        );

        return view('checkout.success', compact('order'));
    }
}
