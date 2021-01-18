<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class IndexController extends Controller
{
    public function index(){
        $products = Product::where('discount', '!=', 'null')
            ->get()
            ->sortByDesc('discountPercent')
            ->take(10);
        return view('index', compact('products'));
    }

    public function product($id = null){
        $product = product::where('id', $id)->first();
        return view('product', compact('product'));
    }

    public function add_rate(){
        $product_id = request()->input('product_id');
        $rate = request()->input('ratedIndex');
        $user_id = Auth::id();
        $rate++;

        $rating = Rating::where('product_id', $product_id)->where('user_id', $user_id)->get()->first();
        if(empty($rating)){
            Rating::create([
                'product_id' => $product_id,
                'user_id' => $user_id,
                'rate' => $rate
            ]);
        }

        if($rating->rate == 1){
            echo 
            '<h6>Ваша оценка</h6>
            <div class="stars">
                <i class="fa fa-star" style="color:green"></i>
                <i class="far fa-star" style="color:#000"></i>
                <i class="far fa-star" style="color:#000"></i>
                <i class="far fa-star" style="color:#000"></i>
                <i class="far fa-star" style="color:#000"></i>
            </div>';
        }else if($rating->rate == 2){
            echo 
            '<h6>Ваша оценка</h6>
            <div class="stars">
                <i class="fa fa-star" style="color:green"></i>
                <i class="fa fa-star" style="color:green"></i>
                <i class="far fa-star" style="color:#000"></i>
                <i class="far fa-star" style="color:#000"></i>
                <i class="far fa-star" style="color:#000"></i>
            </div>';
        }else if($rating->rate == 3){
            echo 
            '<h6>Ваша оценка</h6>
            <div class="stars">
                <i class="fa fa-star" style="color:green"></i>
                <i class="fa fa-star" style="color:green"></i>
                <i class="fa fa-star" style="color:green"></i>
                <i class="far fa-star" style="color:#000"></i>
                <i class="far fa-star" style="color:#000"></i>
            </div>';
        }else if($rating->rate == 4){
            echo 
            '<h6>Ваша оценка</h6>
            <div class="stars">
                <i class="fa fa-star" style="color:green"></i>
                <i class="fa fa-star" style="color:green"></i>
                <i class="fa fa-star" style="color:green"></i>
                <i class="fa fa-star" style="color:green"></i>
                <i class="far fa-star" style="color:#000"></i>
            </div>';
        }else if($rating->rate == 5){
            echo 
            '<h6>Ваша оценка</h6>
            <div class="stars">
                <i class="fa fa-star" style="color:green"></i>
                <i class="fa fa-star" style="color:green"></i>
                <i class="fa fa-star" style="color:green"></i>
                <i class="fa fa-star" style="color:green"></i>
                <i class="fa fa-star" style="color:green"></i>
            </div>';
        };
    }
}