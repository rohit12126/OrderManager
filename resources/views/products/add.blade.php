@extends('layouts.modal')

@push('modal-title') 
Add Product  @endpush
@push('modal-id','add-product')

@section('modal-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">  
        	<form action="{{route('products.add')}}" method="POST" id="add-form">
                @csrf
            	<div class="form-group">
            		<label>Name</label>
            		<input type="text" name="name" class="form-control" value="@">
            	</div>
            	<div class="form-group">
            		<label>Price</label>
            		<input type="text" name="price" class="form-control">
            	</div>
            	<div class="form-group">
	            	<div class="form-check form-check-inline">
					  <input class="form-check-input" type="radio" name="in_stock" value="1" id="in_stock_1" checked="checked">
					  <label class="form-check-label" for="in_stock_1">
					    In Stock
					  </label>
					</div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="in_stock" value="0" id="in_stock_0">
                      <label class="form-check-label" for="in_stock_0">
                        Out Of Stock
                      </label>
                    </div>
				</div>
            	<button class="btn btn-primary float-right">Save</button>
        	</form>	
        </div>
    </div>
</div>
@stop

@push('js')

<!-- <script type="text/javascript" src="{{asset('js/pages/customer-add.js')}}"></script> -->

@endpush