<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status_id', 1)->get()->first();
        return view('cart', compact('order'));
    }

    public function create(Request $request)
    {
        $item_id = $request->item_id;
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status_id', '=' , 1)->get()->first();
        if($order == null){
            $order = Order::create([
                'user_id' => Auth::id(),
            ]);
        }
        if($order->items->contains($item_id)){
            $pivot_row = $order->items()->where('product_id', $item_id)->first()->pivot;
            $pivot_row->count++;
            $pivot_row->update();
        }else{
            $order->items()->attach($item_id);
        }
    }

    public function unlike($item_id){
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status_id', 1)->get()->first();
        if($order->items->contains($item_id)){
            $order->items()->detach($item_id);
            return $item_id;
        }
    }

    public function update(Request $request){
        $item_id = $request->item_id;
        $count = $request->count;

        $order = Order::where('user_id', Auth::id())->where('status_id', '=' , 1)
            ->with('items')
            ->first();
        if ($count <= 0) {
            $order->items()->detach($item_id);
            return response('Deleted');
        } else {
            $pivot = $order->items->find($item_id)->pivot;
            $pivot->count = $count;
            $pivot->update();
        }

        return $order;
    }

    public function getData(){
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status_id', '=' , 1)->get()->first();
        return $order->items->load('product.galleries', 'product.measure');
    }

    public function destroy(Request $request){
        $order = Order::where('user_id', Auth::id())->where('status_id', '=' , 1)->get()->first();
        $order->items()->detach($request->item_id);
    }

    public function count(){
        if (Auth::check()) {
            $user_id = Auth::id();
            $order = Order::where('user_id', $user_id)->where('status_id', '=' , 1)->get()->first();
            if($order == null){
                return 0;
            }else{
                return $order->items;
            }
        }
    }
}