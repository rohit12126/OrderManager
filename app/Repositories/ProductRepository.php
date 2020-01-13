<?php 

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
	//Default product price
	protected $product_price = '0.00';

	/**
     * Save the change in the model
     *
     * @param  array $data
     * @param  \App\Models\Product $product
     *
     * @return \App\Models\Product
     */
	function save(array $data, Product $product)
	{
		$product->name = (!empty($data['name'])?$data['name']:$product->name);

		if(empty($product->price))
			$product->price = $this->product_price;

		$product->price = (!empty($data['price'])?$data['price']:$product->price);
		$product->in_stock = (empty($data['in_stock'])?$data['in_stock']:1);

		$product->save();

		return $product;
	}

	/**
     * Remove the product entity
     *
     * @param  \App\Models\Product $product
     *
     * @return true or false
     */
	function delete(Product $product)
	{
		try{

			if($product->hasOrders())
				return false;

			$product->delete();	
			return true;
		}
		catch(Exception $e){
			return false;
		}
		
	}
}