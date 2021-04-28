<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Duration;
use Illuminate\Support\Facades\Auth;
use Pusher\PushNotifications\PushNotifications;
use Illuminate\Support\Facades\DB;

class DeliveryController extends Controller
{
    public function index(){
        return view('delivery.index');
    }

    public function available(){
        $orders = Order::where('status_id', 4)->get();
        return $orders;
    }

    public function accept(Request $request){
        DB::table('orders')
        ->where('id', $request->id)
        ->update([
            'status_id' => 5,
            'delivery_id' => Auth::id()
        ]);
        Duration::create([
            'user_id' => Auth::id(),
            'order_id' =>$request->id,
            'started_at' => now()
        ]);
        return response()->json('success');
    }

    public function order($id){
        if($order = Order::where('id', $id)->first()){
            DB::table('orders')
            ->where('id', $id)
            ->update(['status_id' => 5]);
            return view('delivery.order', compact('order'));
        }
    }

    public function history(){
        $orders = Order::where('delivery_id', Auth::id())->whereIn('status_id', [6,7])->paginate(10);
        return view('delivery.history', compact('orders'));
    }

    public function current(){
        $orders = Order::where([['status_id', '5'],['delivery_id',Auth::id()]])->get();
        return view('delivery.current', compact('orders'));
    }

    public function end(Order $order){
        DB::table('orders')
        ->where('id', $order->id)
        ->update([
            'delivery_id' => Auth::id(),
            'status_id' => 7
        ]);

        $userId = "'".$order->user->id."'";

        $beamsClient = new PushNotifications(array(
            "instanceId" => "41acbae0-ec93-4866-bce7-937bff9c4d27",
            "secretKey" => "6EF41FB22546E116081BFE4439F77EF66F1F52FE24841500853EB04A9DB20D06",
        ));
        $beamsClient->publishToUsers(
            [$userId],//Buyer Id
            [
                "web" => [
                    "notification" => [
                        "title" => "Фасовка",
                        "body" => "Ваши товар прибыл",
                        'icon' => secure_asset('/img/logo/push.png'),
                        "deep_link" => 'https://smartbazar.kz/delivery'
                    ]
                    ],
                "fcm" => [
                    "notification" => [
                        "title" => "Фасовка",
                        "body" => "Ваши товар прибыл",
                        'icon' => secure_asset('/img/logo/push.png'),
                        "deep_link" => 'https://smartbazar.kz/delivery'
                    ]
                ]
            ]
        );



        return redirect()->route('delivery.index')->with(['success'=>'Доставка завершена']);
    }
}