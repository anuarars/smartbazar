<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id'];
    public $deliveryPrice = 1500;

    public function delivery(){
        return 100;
    }

    public function items(){
        return $this->belongsToMany(Item::class)->withPivot('count', 'id')->withTimestamps();;
    }

    public function fullPrice(){
        $sum = 0;
        foreach($this->items as $item){
            $sum += $item->priceForCount();
        }
        return $sum;
    }

    public function fullPriceNoDiscount(){
        $sum = 0;
        foreach($this->items as $item){
            $sum += $item->priceForCountNoDiscount();
        }
        return number_format($sum, 0, ' ', ' ');
    }

    public function fullPriceWithDelivery(){
        $sum = 0;
        foreach($this->items as $item){
            $sum += $item->priceForCount();
        }
        $sum += $this->deliveryPrice;
        return number_format($sum, 0, ' ', ' ');
    }

    public function cart_count(){
        $total = 0;
        foreach($this->products as $product) {
            $total += $product->pivot->count;
        }
        return $total;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function phone()
    {
        return $this->morphOne('App\Models\Phone', 'phoneable');
    }

    public function address()
    {
        return $this->morphMany('App\Models\Address', 'addressable');
    }
}
