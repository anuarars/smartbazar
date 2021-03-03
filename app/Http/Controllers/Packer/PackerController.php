<?php

namespace App\Http\Controllers\Packer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PackerController extends Controller
{
    public function index(){
        return view('packer.index');
    }

    public function available(){
        $orders = Order::where('status_id', 2)->get();
        return $orders;
    }

    public function accept(){
        $order_id = request()->input('order_id');
        return redirect()->route('packer.order', [$order_id])->with(['success'=>'Заказ успешно принят']);
    }

    public function order($id){
        if($order = Order::where('id', $id)->where('isFinished', 0)->first()){
            DB::table('orders')
            ->where('id', $id)
            ->update([
                'status_id' => 3,
                'packer_id' => Auth::id()
            ]);
            return view('packer.order', compact('order'));
        }
        return redirect()->route('delivery.index')->with(['error'=>'Данного заказа не существует']);
    }
}