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

    public function getAllChildren ()
    {
        $sections = collect();

        foreach ($this->children as $section) {
            $sections->push($section);
            $sections = $sections->merge($section->getAllChildren());
        }

        return $sections;
    }

    public function scopeChildless($q)
    {
        $q->has('grandchildren', '!=', 0);
    }

    // public function productQuantity(){
    //     $count = $this->products()->count();

    //     foreach ($this->children as $child) {
    //         $count += $child->products()->count();
    //     }

    //     return $count;
    // }
}
