<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function index(){
        return view('delivery.index');
    }

    public function accept(){
        $order_id = request()->input('order_id');
        return redirect()->route('delivery.order', [$order_id])->with(['success'=>'Заказ успешно принят']);
    }

    public function order($id){
        if($order = Order::where('id', $id)->where('status', 0)->first()){
            return view('delivery.order', compact('order'));
        }
        return redirect()->route('delivery.index')->with(['error'=>'Данного заказа не существует']);
    }

    public function end(){
        $order_id = request()->input('order_id');
        $order = Order::find($order_id);
        $order->status = 1;
        $order->delivery_status = 1;
        $order->delivery_id = Auth::id();
        $order->save();

        return redirect()->route('delivery.index')->with(['success'=>'Доставка завершена']);
    }
}