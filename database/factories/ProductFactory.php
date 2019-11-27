<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => 'Product '.$faker->unique()->numberBetween(1,100),
        'price' => $faker->randomFloat(2,0,1000),
        'in_stock' => $faker->boolean(50),
    ];
});
