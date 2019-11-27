@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Customers</div>

                <div class="card-body">
                	<table class="table table-striped datatable" data-url="{{route('customers.datatables')}}">
                		<thead>
                			<tr>
                				<th>Name</th>
                				<th>Email</th>
                				<th>Registered Date</th>
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

<script type="text/javascript" src="{{asset('js/pages/customers.js')}}"></script>

@endpush