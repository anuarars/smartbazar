<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
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

    public function accept(){
        $order_id = request()->input('order_id');
        return redirect()->route('delivery.order', [$order_id])->with(['success'=>'Заказ успешно принят']);
    }

    public function order($id){
        if($order = Order::where('id', $id)->where('isFinished', 0)->first()){
            DB::table('orders')
            ->where('id', $id)
            ->update(['status_id' => 5]);
            return view('delivery.order', compact('order'));
        }
    }

    public function end(Order $order){
        DB::table('orders')
        ->where('id', $order->id)
        ->update([
            'isFinished' => 1,
            'delivery_id' => Auth::id(),
            'status_id' => 6
        ]);

        return redirect()->route('delivery.index')->with(['success'=>'Доставка завершена']);
    }
}