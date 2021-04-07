<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Kyslik\ColumnSortable\Sortable;

// use Laravel\Scout\Searchable;

class Product extends Model
{
    // use Searchable;
     use Sortable;

    public $sortable = ['price', 'discount', 'category_id', 'created_at'];

    protected $fillable = ['user_id', 'country_id', 'brand_id', 'measure_id', 'company_id', 'category_id', 'title', 'description', 'price', 'count', 'discount', 'image', 'sku'];

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

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function properties(){
        return $this->hasMany(Property::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function userRating(){
        $user_id = Auth::id();
        $userRating = $this->ratings->where('user_id', $user_id)->first();
        if($userRating){
            if($userRating->rate==1){
                echo
                '<div class="submitted_stars">
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="far fa-star" style="color:#000"></i>
                    <i class="far fa-star" style="color:#000"></i>
                    <i class="far fa-star" style="color:#000"></i>
                    <i class="far fa-star" style="color:#000"></i>
                </div>';
            }else if($userRating->rate==2){
                echo
                '<h6>Ваша оценка</h6>
                <div class="submitted_stars">
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="far fa-star" style="color:#000"></i>
                    <i class="far fa-star" style="color:#000"></i>
                    <i class="far fa-star" style="color:#000"></i>
                </div>';
            }else if($userRating->rate==3){
                echo
                '<h6>Ваша оценка</h6>
                <div class="submitted_stars">
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="far fa-star" style="color:#000"></i>
                    <i class="far fa-star" style="color:#000"></i>
                </div>';
            }else if($userRating->rate==4){
                echo
                '<h6>Ваша оценка</h6>
                <div class="submitted_stars">
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="far fa-star" style="color:#000"></i>
                </div>';
            }else{
                echo
                '<h6>Ваша оценка</h6>
                <div class="submitted_stars">
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="fa fa-star" style="color:green"></i>
                    <i class="fa fa-star" style="color:green"></i>
                </div>';
            }
        }else{
            echo
            '<h6>Оценить</h6>
            <div class="stars">
                <i class="far fa-star" data-index=0></i>
                <i class="far fa-star" data-index=1></i>
                <i class="far fa-star" data-index=2></i>
                <i class="far fa-star" data-index=3></i>
                <i class="far fa-star" data-index=4></i>
            </div>';
        }
    }

    public function avgRating(){
        $average_rating = $this->ratings->avg('rate');
        if($average_rating == null){
            return 5;
        }else{
            return $average_rating;
        }
    }

    // ACCESSOR
    public function getafterDiscountAttribute(){
        return ceil($this->priceAfterFee() - (($this->priceAfterFee() * $this->discount)/100));
    }

    public function priceAfterFee(){
        return $this->price+(($this->price*10)/100);
    }

    public function priceForCount(){
        if(!is_null($this->pivot)){
            if(!empty($this->discount)){
                return $this->pivot->count * $this->getafterDiscountAttribute();
            }
            return $this->pivot->count * $this->priceAfterFee();
        }
        return $this->priceAfterFee();
    }

    public function priceForCountNoDiscount(){
        if(!is_null($this->pivot)){
            return $this->pivot->count * $this->priceAfterFee();
        }
        return $this->priceAfterFee();
    }

    public function isFavoritedBy(){
        if ($user = User::find(Auth::id())) {
            return (bool) $user->wishlist()->where('product_id', $this->id)->first();
        }
    }

    public function isAddedToCartBy(): bool
    {
        if ($user = User::find(Auth::id())) {
            $order = $user->order()->where('status_id', 1)->get()->first();
        } else {
            return false;
        }
        if ($order == null) {
            return false;
        } else if ($order->products->contains($this->id)) {
            return true;
        } else {
            return false;
        }
    }
}
