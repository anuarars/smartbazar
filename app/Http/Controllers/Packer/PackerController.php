<?php

namespace App\Http\Controllers\Packer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PackerController extends Controller
{
    public function index(){
        return view('packer.index');
    }

    public function accept(){
        $order_id = request()->input('order_id');
        return redirect()->route('packer.order', [$order_id])->with(['success'=>'Заказ успешно принят']);
    }

    public function order($id){
        if($order = Order::where('id', $id)->where('status', 0)->first()){
            return view('packer.order', compact('order'));
        }
        return redirect()->route('delivery.index')->with(['error'=>'Данного заказа не существует']);
    }
}