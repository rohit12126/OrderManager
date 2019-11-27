@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                	<table class="table table-striped datatable" data-url="{{route('products.datatables')}}">
                		<thead>
                			<tr>
                				<th>Name</th>
                				<th>Price</th>
                				<th>In Stock</th>
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

@push('js')

<script type="text/javascript" src="{{asset('js/pages/products.js')}}"></script>

@endpush