<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['title', 'description', 'parent_id'];

    public function children(){
        return $this->hasMany(static::class, 'parent_id');
    }

    public function grandchildren()
    {
        return $this->children()->with('grandchildren');
    }

    // public function parent(){
    //     return $this->belongsTo(static::class, 'parent_id');
    // }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
