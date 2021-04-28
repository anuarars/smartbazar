<?php

namespace App\Http\Controllers;

use App\Events\DeliveryEvent;
use App\Events\PackerEvent;
use App\Models\Order;
use App\Models\Role;
use App\Models\Duration;
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

}