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
        return view('checkout.index', compact('order'));
    }

    public function success($orderId){
        $url = env('APP_URL');
        $order = Order::where('id', $orderId)->with('status')->first();
        DB::table('orders')
            ->where('id', $orderId)
            ->update(['status_id' => 2]);

        event(new PackerEvent($order));
        event(new SaleEvent($order));

        $beamsClient = new PushNotifications(array(
            "instanceId" => "41acbae0-ec93-4866-bce7-937bff9c4d27",
            "secretKey" => "6EF41FB22546E116081BFE4439F77EF66F1F52FE24841500853EB04A9DB20D06"
        ));

        // PACKERS ARRAY PREPARE TO SEND
        $userIds = Role::find(3)->users()->pluck('user_id');
        foreach($userIds as $id) {
            $sendId = "'".$id."'";
            $packageUsers[] = $sendId;
        }

        $publishToPacker = $beamsClient->publishToUsers(
            $packageUsers,//packers Ids
            [
                "web" => [
                    "notification" => [
                        "title" => "Заказ",
                        "body" => "Новая Фасовка",
                        'icon' => secure_asset('/img/logo/push.png'),
                        "deep_link" => 'http://smartbazar.kz/packer'
                    ]
                ],
                "fcm" => [
                    "notification" => [
                        "title" => "Заказ",
                        "body" => "Новая Фасовка",
                        'icon' => secure_asset('/img/logo/push.png'),
                        "deep_link" => 'http://smartbazar.kz/packer'
                    ]
                ]
            ]
        );

        foreach ($order->items as $item){
            foreach ($item->company->users as $user) {
                $userId = "'".$user->id."'";
                $sale[] = $userId;
            }
        }

        $saleUsers = array_unique($sale);

        $publishToSeller = $beamsClient->publishToUsers(
            $saleUsers,//Buyer Id
            [
                "web" => [
                    "notification" => [
                        "title" => "Покупки",
                        "body" => "Ваши товар куплен",
                        'icon' => secure_asset('/img/logo/push.png'),
                        "deep_link" => 'http://smartbazar.kz/home'
                    ]
                    ],
                "fcm" => [
                    "notification" => [
                        "title" => "Покупки",
                        "body" => "Ваши товар куплен",
                        'icon' => secure_asset('/img/logo/push.png'),
                        "deep_link" => 'http://smartbazar.kz/home'
                    ]
                ]
            ]
        );

        return view('checkout.success', compact('order'));
    }

    public function updateOrderByUser(Order $orderId, Request $request)
    {
        $orderId->address()->create([
            'description' => implode(', ', $request->description),
        ]);

        $orderId->orderInfo()->updateOrCreate([
            'description' => $request->infoByUser,
            'phone' =>$request->orderPhone
        ]);

        return $orderId;
    }
}
