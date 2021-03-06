<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['product_id', 'user_id', 'rate'];
    
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
