@extends('admin.layout.base')

@section('title', 'Manage Inventory')

@section('data-page-id', 'adminProduct')

@section('content')
 
 <div class='products'>
    {{-- expanded is a class from zurb foundation --}}
    <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Order History</h2>
        
    </div>
    <div class='text-border'></div>
    {{--to show the message from the message blade file in the includes folder--}}
    @include('includes.message')

    <div class='grid-x ' style='margin:0 0.9rem'>
        <div class='cell small-12 medium-12'>
            @if(count($orders))

                <table class='hover unstriped' data-form="deleteForm">
                    <tbody>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User_Id</th>
                                <th>Product_Id</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Order_No</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @foreach($orders as $order)
                           <tr>
                                
                                <td>{{$order['id']}}</td>
                                <td>{{$order['user_id']}}</td> 
                                <td>{{$order['product_id']}}</td> 
                                <td>{{$order['unit_price']}}</td>
                                <td>{{$order['quantity']}}</td>
                                <td>{{$order['total']}}</td>
                                <td>{{$order['order_no']}}</td>
                                <td>{{$order['status']}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{!! $links !!}</p>
            @else
             <h3>You do not have any more orders</h3>
            @endif
        </div>
    </div>
 </div>
 @include('includes.delete-modal')
@endsection