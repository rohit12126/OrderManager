@extends('layouts.modal')

@push('modal-title') 
Add Customer  @endpush
@push('modal-id','add-customer')

@section('modal-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<form action="{{route('customers.add')}}" method="POST">
            	<div class="form-group">
            		<label>Name</label>
            		<input type="text" name="name" class="form-control">
            	</div>
            	<div class="form-group">
            		<label>Email</label>
            		<input type="email" name="email" class="form-control">
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