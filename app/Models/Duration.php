<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Duration extends Model
{
    protected $fillable = ['started_at', 'finished_at', 'order_id', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    // public function timeSpend(){
    //     return Carbon::parse($this->finished_at)->diffInMinutes(Carbon::parse($this->started_at));
    // }
}