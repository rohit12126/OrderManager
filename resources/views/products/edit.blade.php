@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Products
                </div>

                <div class="card-body">
		        	<form action="{{route('products.update',['product'=>$product])}}" method="POST">
		                @csrf
		            	<div class="form-group">
		            		<label>Name</label>
		            		<input type="text" name="name" class="form-control" value="{{$product->name}}" required>
		            	</div>
		            	<div class="form-group">
		            		<label>Price</label>
		            		<input type="text" name="price" class="form-control" value="{{$product->price}}" required>
		            	</div>
		            	<div class="form-group">
			            	<div class="form-check form-check-inline">
							  <input class="form-check-input" type="radio" name="in_stock" value="1" id="in_stock_1" 
							  	@if($product->in_stock)
							  		checked="checked"
							  	@endif
							  >
							  <label class="form-check-label" for="in_stock_1">
							    In Stock
							  </label>
							</div>
		                    <div class="form-check form-check-inline">
		                      <input class="form-check-input" type="radio" name="in_stock" value="0" id="in_stock_0" 
		                      	@if(!$product->in_stock)
							  		checked="checked"
							  	@endif>
		                      <label class="form-check-label" for="in_stock_0">
		                        Out Of Stock
		                      </label>
		                    </div>
						</div>
						<a class="btn btn-danger ml-1 float-right" href="{{route('products')}}">Cancel</a>
		            	<button class="btn btn-primary float-right">Save</button>
		        	</form>	
		    	</div>
		    </div>
		</div>
    </div>
</div>
@endsection

@push('js')

<script type="text/javascript" src="{{asset('js/pages/products.js')}}"></script>

@endpush