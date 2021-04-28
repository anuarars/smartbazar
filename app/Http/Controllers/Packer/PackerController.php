<?php

namespace App\Http\Controllers\Packer;

use App\Http\Controllers\Controller;
use App\Models\Duration;
use App\Models\Order;
use App\Models\Role;
use App\Events\DeliveryEvent;
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

    public function accept(Request $request){
        if($order = Order::where('id', $request->id)->first()){
            DB::table('orders')
            ->where('id', $request->id)
            ->update([
                'status_id' => 3,
                'packer_id' => Auth::id()
            ]);
            Duration::create([
                'user_id' => Auth::id(),
                'order_id' =>$request->id,
                'started_at' => now()
            ]);    

            $userId = "'".$order->user->id."'";

            $beamsClient = new PushNotifications(array(
                "instanceId" => "41acbae0-ec93-4866-bce7-937bff9c4d27",
                "secretKey" => "6EF41FB22546E116081BFE4439F77EF66F1F52FE24841500853EB04A9DB20D06",
            ));
            $publishResponse = $beamsClient->publishToUsers(
                [$userId],//Buyer Id
                [
                    "web" => [
                        "notification" => [
                            "title" => "Фасовка",
                            "body" => "Ваши товары фасуются",
                            'icon' => secure_asset('/img/logo/push.png'),
                            "deep_link" => 'https://smartbazar.kz/home'
                        ]
                    ],
                    "fcm" => [
                        "notification" => [
                            "title" => "Фасовка",
                            "body" => "Ваши товары фасуются",
                            'icon' => secure_asset('/img/logo/push.png'),
                            "deep_link" => 'https://smartbazar.kz/home'
                        ]
                    ]
                ]
            );

            return response()->json('success');
        }

        return response()->json('failure');
    }

    public function order($id){
        if($order = Order::where('id', $id)->first()){
            DB::table('orders')
            ->where('id', $id)
            ->update([
                'status_id' => 3,
                'packer_id' => Auth::id()
            ]);
            return view('packer.order', compact('order'));
        }
        return redirect()->back()->with(['error'=>'Данного заказа не существует']);
    }

    public function history(){
        $orders = Order::where('packer_id', Auth::id())->whereIn('status_id', [4,5,6,7])->paginate(10);
        return view('packer.history', compact('orders'));
    }

    public function current(){
        $orders = Order::where([['status_id', '3'],['packer_id',Auth::id()]])->get();
        return view('packer.current', compact('orders'));
    }

    public function delivery(Order $order){
        DB::table('orders')
        ->where('id', $order->id)
        ->update([
            'status_id' => 4
        ]);
        Duration::where([['order_id', $order->id],['user_id', Auth::id()]])->update([
            'finished_at' => now()
        ]);
 
        $beamsClient = new PushNotifications(array(
            "instanceId" => "41acbae0-ec93-4866-bce7-937bff9c4d27",
            "secretKey" => "6EF41FB22546E116081BFE4439F77EF66F1F52FE24841500853EB04A9DB20D06",
        ));

        // PACKERS ARRAY PREPARE TO SEND
        $userIds = Role::find(4)->users()->pluck('user_id');
        foreach($userIds as $id) {
            $sendId = "'".$id."'";
            $deliveryUsers[] = $sendId;
        }
        
        $beamsClient->publishToUsers(
            $deliveryUsers,//delivery Ids
            [
                "web" => [
                    "notification" => [
                        "title" => "Заказ",
                        "body" => "Новая Доставка",
                        'icon' => secure_asset('/img/logo/push.png'),
                        "deep_link" => 'https://smartbazar.kz/delivery'
                    ]
            ],
                "fcm" => [
                    "notification" => [
                        "title" => "Заказ",
                        "body" => "Новая Доставка",
                        'icon' => secure_asset('/img/logo/push.png'),
                        "deep_link" => 'https://smartbazar.kz/delivery'
                    ]
                ]
            ]
        );
        event(new DeliveryEvent($order));
        return redirect()->route('packer.index');
    }
}