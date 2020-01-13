<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
    	'invoice_number','total_amount', 'status' 
    ];

    // Relation of order items
    function orderItems()
    {
		return $this->hasMany(OrderItem::class);
    }

    // Relation of customer
    function customer(){
    	return $this->belongsTo(Customer::class);
    }
}
