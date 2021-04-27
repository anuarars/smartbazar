<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name','code', 'phone','email', 'description', 'bin', 'image'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('discount', 'price', 'count', 'isPublished', 'views')->withTimestamps();
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
