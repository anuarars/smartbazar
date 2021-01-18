<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $fillable = ['user_id', 'country_id', 'brand_id', 'measure_id', 'company_id', 'category_id', 'title', 'description', 'price', 'count', 'discount', 'image'];

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
        // if($average_rating == 1){
        //     echo 
        //     '<div class="product_rating">
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="far fa-star" style="color:#000"></i>
        //         <i class="far fa-star" style="color:#000"></i>
        //         <i class="far fa-star" style="color:#000"></i>
        //         <i class="far fa-star" style="color:#000"></i>
        //     </div>';
        // }else if($average_rating == 2){
        //     echo 
        //     '<div class="product_rating">
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="far fa-star" style="color:#000"></i>
        //         <i class="far fa-star" style="color:#000"></i>
        //         <i class="far fa-star" style="color:#000"></i>
        //     </div>';
        // }else if($average_rating == 3){
        //     echo 
        //     '<div class="product_rating">
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="far fa-star" style="color:#000"></i>
        //         <i class="far fa-star" style="color:#000"></i>
        //     </div>';
        // }else if($average_rating == 4){
        //     echo 
        //     '<div class="product_rating">
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="far fa-star" style="color:#000"></i>
        //     </div>';
        // }else{
        //     echo 
        //     '<div class="product_rating">
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="fa fa-star" style="color:green"></i>
        //         <i class="fa fa-star" style="color:green"></i>
        //     </div>';
        // };
    }

    public function get_price_for_count(){
        if(!is_null($this->pivot)){
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }


    // ACCESSOR
    public function getdiscountPercentAttribute(){
        return ceil(($this->price - $this->discount)/$this->price *100);
    }

}