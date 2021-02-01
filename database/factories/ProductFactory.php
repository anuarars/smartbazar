<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $discountPrice = rand(0, 100);
    if($discountPrice > 20){
        $discountPrice = null;
    }
    $color = substr($faker->hexcolor, 1);
    $data = [    
        'category_id' => rand(4, 10),
        'user_id' => 2,
        'brand_id' => rand(1, 10),
        'country_id' => rand(1, 200),
        'measure_id' => rand(1, 5),
        'company_id' => 1,
        'title' => $faker->word(),
        'description' => $faker->sentence(rand(3, 8), true),
        'price' => rand(5000, 6000),
        'count' => rand(10, 50),
        'discount' => $discountPrice,
        'image' => "https://via.placeholder.com/400x400/$color"
    ];

    return $data;
});