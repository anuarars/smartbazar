<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Events\PackerEvent;
use App\Events\SaleEvent;
use Illuminate\Support\Facades\DB;

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
        $sum = 0;
        foreach ($order->products as $product) {
            $sum += $product->price * $product->pivot->count;
        }
        return view('checkout.success', compact('order', 'sum'));
    }
}
