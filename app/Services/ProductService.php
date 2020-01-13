<?php 

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductService
{
	//Product repository object
	protected $repository;

	/**
     * Constructor
     *
     * @param  \App\Repositories\ProductRepository $repository
     *
     * @return \App\Services\ProductService
     */
	function __construct(ProductRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
     * Add Product
     *
     * @param  array $request
     *
     * @return \App\Services\ProductService
     */
	function add($request)
	{
		return $this->repository->save($request, (new Product()));
	}

	/**
     * Update Product
     *
     * @param  \App\Models\Product $product
     * @param  array $request
     *
     * @return \App\Services\ProductService
     */
	function update(Product $product, $request)
	{
		return $this->repository->save($request,$product);
	}

	/**
     * Delete Product
     *
     * @param  \App\Models\Product $product
     *
     * @return \App\Services\ProductService
     */
	function delete(Product $product)
	{
		try{
			return $this->repository->delete($product);	
		}
		catch(Exception $e){
			return false;
		}
		
	}

}