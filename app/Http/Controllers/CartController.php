<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function basket()
    {
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status', 0)->get()->first();
        return view('cart', compact('order'));
    }

    public function create(Request $request)
    {
        $product_id = $request->product_id;
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status', 0)->get()->first();
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
        return $product_id;
    }

    public function remove($product_id){
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status', 0)->get()->first();
        if($order == null){
            $order = Order::create([
                'user_id' => Auth::id(),
            ]);
        }
        if($order->products->contains($product_id)){
            $pivot_row = $order->products()->where('product_id', $product_id)->first()->pivot;
            if($pivot_row->count < 2){
                $order->products()->detach($product_id);
            }else{
                $pivot_row->count--;
                $pivot_row->update();
            }       
        }
        return redirect()->route('cart.index');
    }

    public function update(){
        $product_id_plus = request()->input('product-id-plus');
        $product_id_minus = request()->input('product-id-minus');
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status', 0)->get()->first();

        if(!empty($product_id_plus)){
            if($order->products->contains($product_id_plus)){
                $pivot_row = $order->products()->where('product_id', $product_id_plus)->first()->pivot;
                $pivot_row->count++;
                $pivot_row->update();
            }
            return $product_id_plus;
        }

        if(!empty($product_id_minus)){
            if($order->products->contains($product_id_minus)){
                $pivot_row = $order->products()->where('product_id', $product_id_minus)->first()->pivot;
                if($pivot_row->count < 2){
                    $order->products()->detach($product_id_minus);
                }else{
                    $pivot_row->count--;
                    $pivot_row->update();
                }       
            }
            return $product_id_minus;
        }
    }

    public function count(){
        $user_id = Auth::id();
        $order = Order::where('user_id', $user_id)->where('status', 0)->get()->first();
        $productNominal = $order->products->count();

        $sum = 0;
        $productCount = 0;
        foreach($order->products as $product){
            $priceForProduct = $product->pivot->count * $product->price;
            $sum += $priceForProduct;
            $productCount += $product->pivot->count;
        }

        $response = [
            'sum' => $sum, 
            'products' => $productNominal, 
            'productsCount' => $productCount
        ];

        return $response;
    }
}