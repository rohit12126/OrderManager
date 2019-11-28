<?php

use Illuminate\Database\Seeder;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Bouncer::allow('administrator')->everything();
        \Bouncer::allow('user-manager')->to('view',App\Models\Customer::class);
        \Bouncer::allow('shop-manager')->to('view',App\Models\Product::class);
        \Bouncer::allow('shop-manager')->to('view',App\Models\Order::class);
        \Bouncer::allow('shop-manager')->to('view',App\Models\OrderItem::class);
     	
    }
}
