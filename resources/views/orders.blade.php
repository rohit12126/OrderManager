@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Orders</div>

                <div class="card-body">
                	<table class="table table-striped datatable" data-url="{{route('orders.datatables')}}">
                		<thead>
                			<tr>
                				<th>Customer Name</th>
                				<th>Total Amount</th>
                				<th>Status</th>
                				<th class="never">created at</th>
                				<th class="never">customer</th>
                				<th class="never">id</th>
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

<script type="text/javascript" src="{{asset('js/pages/orders.js')}}"></script>

@endpush