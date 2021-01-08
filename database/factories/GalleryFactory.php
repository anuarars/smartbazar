<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Gallery;
use Faker\Generator as Faker;

$factory->define(Gallery::class, function (Faker $faker) {
    $color = substr($faker->hexcolor, 1);
    $data = [    
        'image' => "https://via.placeholder.com/400x400/$color",
        'product_id' => rand(1, 100),
        'user_id' => 2,
    ];

    return $data;
});