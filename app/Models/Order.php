<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id'];

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count', 'id')->withTimestamps();;
    }

    public function get_full_price(){
        $sum = 0;
        foreach($this->products as $product){
            $sum += $product->get_price_for_count();
        }
        return $sum;
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
}
