<?php

namespace App\Http\Controllers;

use App\Events\DeliveryEvent;
use App\Events\PackerEvent;
use App\Models\Order;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function packer(){
        $order_id = request()->input('order_id');
        event(new PackerEvent($order_id));
        return back()->with(['success'=>'Покупка успешно совершена']);
    }

    public function delivery(){
        $order_id = request()->input('order_id');
        event(new DeliveryEvent($order_id));
        return back()->with(['success'=>'Покупка успешно совершена']);
    }
}