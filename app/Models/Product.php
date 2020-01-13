<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
    	'name','price', 'in_stock' 
    ];

    // scope function for the in stock query
    function scopeInStock($query){
    	return $query->where('in_stock',1);
    }

    // scope function for out of stock query
    function scopeOutOfStock($query){
    	return $query->where('in_stock',0);
    }

    // relation function to get the count of entries having orders
    function hasOrders(){
        return $this->hasMany(OrderItem::class,'product_id')->join('orders as o','o.id','=','order_items.order_id')->where('o.status',OrderStatus::newOrder)->count();
    }
}
