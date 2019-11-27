<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Order::class,50)->create()->each(function($order)
        {
        	factory(App\Models\OrderItem::class,mt_rand(1,7))
        		->create([
        			'order_id' => $order->id
        		])
        		->each(function ($item) use(&$order) 
        	{
        		$order->total_amount += (
        			(int)$item->quantity * $item->product->price
        		);
        	});

        	$order->save();
        });
    }
}
