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
        \Bouncer::allow('user-manager')->toManage(App\User::class);
        \Bouncer::allow('shop-manager')->toManage(App\Models\Product::class);
        \Bouncer::allow('shop-manager')->toManage(App\Models\Order::class);
        \Bouncer::allow('shop-manager')->toManage(App\Models\OrderItem::class);
     	
    }
}
