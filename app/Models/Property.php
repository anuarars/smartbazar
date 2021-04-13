<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function values(){
        return $this->hasMany(Value::class);
    }
}