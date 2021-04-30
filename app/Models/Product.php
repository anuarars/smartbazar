<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;

// use Laravel\Scout\Searchable;

class Product extends Model
{
    // use Searchable;
     use Sortable;

    public $sortable = ['price', 'discount', 'category_id', 'created_at', 'title'];

    protected $fillable = [
        'user_id', 'country_id', 'brand_id',
        'measure_id', 'company_id', 'category_id',
        'title', 'description', 'price',
        'count', 'discount', 'sku'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function measure(){
        return $this->belongsTo(Measure::class);
    }

    public function companies(){
        return $this->belongsToMany(Company::class)->withPivot('discount', 'price', 'count','isPublished', 'views')->withTimestamps();
    }

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function properties(){
        return $this->hasMany(Property::class);
    }

    public function items() {
        return $this->hasMany(Item::class);
    }

    public function avgRating(){
        $average_rating = $this->ratings->avg('rate');
        if($average_rating == null){
            return 5;
        }else{
            return $average_rating;
        }
    }

    public function withDiscount() {
        return $this->companies()->wherePivot('discount', true);
    }

    public function priceSortable($query, $direction)
    {
        return $query->join('company_product', 'products.id', '=', 'company_product.product_id')
            ->addSelect(DB::raw('products.*, MIN(price) as minPrice'))
            ->groupBy('product_id')
            ->orderBy("minPrice", $direction);
    }
    public function getMinimumPriceAttribute()
    {
        return $this->items()->min('price');
    }
}
