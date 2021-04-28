<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status_id', 1)->with('items')->get()->first();
        return response(compact('order'));
    }

    public function store(Request $request)
    {
        $item_id = $request->item_id;
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status_id', '=' , 1)->get()->first();
        if($order == null){
            $order = Order::create([
                'user_id' => $user_id,
            ]);
        }
        if($order->items->contains($item_id)){
            $pivot_row = $order->items()->where('product_id', $item_id)->first()->pivot;
            $pivot_row->count++;
            $pivot_row->update();
        }else{
            $order->items()->attach($item_id);
        }

        return response(compact('order'));
    }

    // public function unlike($item_id){
    //     $user_id = Auth::id();
    //     $order = Order::where('user_id', $user_id)->where('status_id', 1)->get()->first();
    //     if($order->items->contains($item_id)){
    //         $order->items()->detach($item_id);
    //         return $item_id;
    //     }
    // }

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
                return $order->items->count();
            }
        }
    }
}