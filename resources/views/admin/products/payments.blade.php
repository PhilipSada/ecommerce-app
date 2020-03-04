@extends('admin.layout.base')

@section('title', 'Manage Inventory')

@section('data-page-id', 'adminProduct')

@section('content')
 
 <div class='products'>
    {{-- expanded is a class from zurb foundation --}}
    <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Payment History</h2>
        
    </div>
    <div class='text-border'></div>
    {{--to show the message from the message blade file in the includes folder--}}
    @include('includes.message')

    <div class='grid-x ' style='margin:0 0.9rem'>
        <div class='cell small-12 medium-12'>
            @if(count($payments))

                <table class='hover unstriped' data-form="deleteForm">
                    <tbody>
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User_Id</th>
                                <th>Order_no</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @foreach($payments as $payment)
                           <tr>
                                
                                <td>{{$payment['id']}}</td>
                                <td>{{$payment['user_id']}}</td> 
                                <td>{{$payment['order_no']}}</td> 
                                <td>{{$payment['amount']}}</td>
                                <td>{{$payment['status']}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{!! $links !!}</p>
            @else
             <h3>You do not have any more payments</h3>
            @endif
        </div>
    </div>
 </div>
 @include('includes.delete-modal')
@endsection