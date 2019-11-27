<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [ 
    	'invoice_number','total_amount', 'status' 
    ];

    function orderItems()
    {
		return $this->hasMany(OrderItem::class);
    }

    function customer(){
    	return $this->belongsTo(Customer::class);
    }
}
