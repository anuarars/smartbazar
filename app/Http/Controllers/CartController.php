<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

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
        $product_id = $request->product_id;
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status_id', '=' , 1)->get()->first();
        if($order == null){
            $order = Order::create([
                'user_id' => Auth::id(),
            ]);
        }
        if($order->products->contains($product_id)){
            $pivot_row = $order->products()->where('product_id', $product_id)->first()->pivot;
            $pivot_row->count++;
            $pivot_row->update();
        }else{
            $order->products()->attach($product_id);
        }
    }

    public function unlike($product_id){
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status_id', 1)->get()->first();
        if($order->products->contains($product_id)){
            $order->products()->detach($product_id);
            return $product_id;
        }
    }

    public function update(Request $request){
        $product_id = $request->product_id;
        $count = $request->count;

        $order = Order::where('user_id', Auth::id())->where('status_id', '=' , 1)
            ->with('products')
            ->first();
        if ($count <= 0) {
            $order->products()->detach($product_id);
            return response('Deleted');
        } else {
            $pivot = $order->products->find($product_id)->pivot;
            $pivot->count = $count;
            $pivot->update();
        }

        return $order;
    }

    public function getData(){
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status_id', '=' , 1)->get()->first();
        return $order->products->load('measure', 'galleries');
    }

    public function destroy(Request $request){
        $order = Order::where('user_id', Auth::id())->where('status_id', '=' , 1)->get()->first();
        $order->products()->detach($request->product_id);
    }

    public function count(){
        if (Auth::check()) {
            $user_id = Auth::id();
            $order = Order::where('user_id', $user_id)->where('status_id', '=' , 1)->get()->first();
            if($order == null){
                return 0;
            }else{
                return $order->products;
            }
        }
    }
}
