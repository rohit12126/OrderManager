@extends('layouts.modal')

@push('modal-title') 
Add Product  @endpush
@push('modal-id','add-product')

@section('modal-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">  
        	<form action="{{route('products.add')}}" method="POST" id="add-form" data-toggle="validator" role="form">
                @csrf
            	<div class="form-group">
            		<label class="control-label">Name</label>
            		<input type="text" name="name" class="form-control" value="" data-toggle="tooltip" title="Product Name" required>
                    <div class="help-block with-errors"></div>
            	</div>
            	<div class="form-group">
            		<label class="control-label">Price</label>
            		<input type="text" name="price" class="form-control" data-toggle="tooltip" title="Product price" required>
                    <div class="help-block with-errors"></div>
            	</div>
            	<div class="form-group">
                    <label>Stock Status</label>
                    <br>
	            	<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="in_stock" value="1" id="in_stock_1" checked="checked" data-toggle="tooltip" title="Product is in stock">
					  <label class="form-check-label" for="in_stock_1">
					    In Stock
					  </label>
					</div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="in_stock" value="0" id="in_stock_0" data-toggle="tooltip" title="Product is out of stock">
                      <label class="form-check-label" for="in_stock_0">
                        Out Of Stock
                      </label>
                    </div>
				</div>
            	<button type="submit" class="btn btn-primary float-right">Save</button>
        	</form>	
        </div>
    </div>
</div>
@stop

@push('js')

<!-- <script type="text/javascript" src="{{asset('js/pages/customer-add.js')}}"></script> -->

@endpush