<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [ 
    	'name','price', 'in_stock' 
    ];


    function scopeInStock($query){
    	return $query->where('in_stock',1);
    }

    function scopeOutOfStock($query){
    	return $query->where('in_stock',0);
    }
}
