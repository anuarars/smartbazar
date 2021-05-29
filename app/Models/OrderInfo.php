<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    protected $fillable = ['description', 'phone'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
