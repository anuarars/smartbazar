<?php

namespace App\Models;

use App\WorkTime;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name','code', 'phone','email','street','home','unit','description'
    ];

    public function users(){
        return $this->hasMany(User::class);
        // return $this->belongsToMany(User::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function workTimes(){
        return $this->hasMany(WorkTime::class);
    }
}
