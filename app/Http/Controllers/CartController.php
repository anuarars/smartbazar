<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function addToCart($product_id)
    {
        $order_id = session('order_id');
        if(is_null($order_id)){
            $order = Order::create();
            session(['order_id'=>$order->id]);
        }else{
            $order = Order::find($order_id);
        }
        $order->products()->attach($product_id);
        return view('cart.index', compact('order'));
    }
}
