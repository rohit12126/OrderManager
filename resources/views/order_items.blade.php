@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Order Items of : {{$order->customer->name}}
                    <div class="float-right">
                        <a href="{{url()->previous()}}" class="btn btn-link">Back to Orders</a>
                    </div>
                </div>

                <div class="card-body">
                	<table class="table table-striped">
                		<thead>
                			<tr>
                				<th>Product</th>
                				<th>Quantity</th>
                			</tr>
                		</thead>
                		<tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td>{{$item->product->name}}</td>
                                <td>{{$item->quantity}}</td>
                            </tr>
                        @endforeach      
                        </tbody>
                	</table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop