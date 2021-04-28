<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',['except' => ['status']]);
    }

    public function index(Request $request){
        if($request->has('status_id')){
            $orders = Order::where('user_id', Auth::id())->where('status_id', $request->status_id)->get();
            return response()->json($orders->load('items.product.galleries', 'items.product.measure', 'items.product.category'));
        }else{
            $orders = Order::where('user_id', Auth::id())->where('status_id', '!=', '7')->get();
            return response()->json($orders->load('items.product.galleries', 'items.product.measure', 'items.product.category'));
        }
    }

    public function status(){
        $statuses = DB::table('statuses')->select('id','name')->get();
        return response()->json($statuses);
    }
}
