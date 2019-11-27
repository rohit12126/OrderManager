<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Order;
use App\Models\Customer;
use App\Enums\OrderStatus;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'customer_id'		=> Customer::inRandomOrder()->first()->id,
        'invoice_number' 	=> "#".strtoupper($faker->bothify('##??##??')),
        'status'			=> $faker->randomElement(OrderStatus::getValues()),
    ];
});
