@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Products
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#add-product" title="Add Product">
                      Add
                    </button>
                </div>

                <div class="card-body">
                	<table class="table table-striped datatable" data-url="{{route('products.datatables')}}">
                		<thead>
                			<tr>
                				<th>Name</th>
                				<th>Price</th>
                				<th>In Stock</th>
                                <th>Actions</th>
                			</tr>
                		</thead>
                		<tbody></tbody>
                	</table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('modals')
    
    @include('products.add')
    
@endpush

@push('js')

<script type="text/javascript" src="{{asset('js/pages/products.js')}}"></script>

@endpush