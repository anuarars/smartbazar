<?php

namespace App\Http\Controllers;

use App\Events\DeliveryEvent;
use App\Events\PackerEvent;
use App\Models\Order;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Pusher\PushNotifications\PushNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function packer(){
        $order_id = request()->input('order_id');
        event(new PackerEvent($order_id));
        return back()->with(['success'=>'Покупка успешно совершена']);
    }

    public function delivery(Order $order){
        DB::table('orders')
        ->where('id', $order->id)
        ->update([
            'status_id' => 4
        ]);

         // PACKERS ARRAY PREPARE TO SEND
         $userIds = Role::find(4)->users()->pluck('user_id');
         foreach($userIds as $id) {
             $sendId = "'".$id."'";
             $deliveryUsers[] = $sendId;
         }
 
         $beamsClient = new PushNotifications(array(
             "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
             "secretKey" => env('PUSHER_BEAMS_SECRET_KEY'),
         ));
         $beamsClient->publishToUsers(
             $deliveryUsers,//delivery Ids
             [
                 "web" => [
                     "notification" => [
                         "title" => "Заказ",
                         "body" => "Новая Доставка",
                         'icon' => secure_asset('/img/logo/push.png'),
                         "deep_link" => env('APP_URL').'packer'
                     ]
                ],
                 "fcm" => [
                     "notification" => [
                         "title" => "Заказ",
                         "body" => "Новая Доставка",
                         'icon' => secure_asset('/img/logo/push.png'),
                         "deep_link" => env('APP_URL').'packer'
                     ]
                 ]
             ]
        );
        event(new DeliveryEvent($order));
        return redirect()->route('packer.index');
    }
}