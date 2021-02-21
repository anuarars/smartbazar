<?php

namespace App\Models;

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

    public function worktimes(){
        return $this->hasMany(WorkTime::class);
    }

    public function address()
    {
        return $this->morphOne('App\Models\Address', 'addressable');
    }

    public function email()
    {
        return $this->morphOne('App\Models\Email', 'emailable');
    }
}
