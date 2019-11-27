<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\OrderItem;
use Faker\Generator as Faker;

$factory->define(OrderItem::class, function (Faker $faker) {
    return [
        'product_id' => Product::inRandomOrder()->first()->id,
      	'quantity' => $faker->randomDigitNotNull()
    ];
});
