<?php

namespace App\Http\Controllers;

use App\Events\DeliveryEvent;
use App\Events\PackerEvent;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
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
        event(new DeliveryEvent($order));
        return redirect()->route('packer.index');
    }
}