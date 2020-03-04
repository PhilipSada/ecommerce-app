@extends('layout.app')

@section('title','Order Confirmation')
@section('data-page-id','confirmation')

@section('content')

<div class="confirmation">
  
   
    <section class="text-center">

        <h4 style="margin-top:3rem;">Thank you, we have received your payment and an order confirmation has been sent to your email</h4>

        <h4 style="margin-top:3rem"> Still want to shop?</h4>
        <a href="/" style="color:black" >Continue Shopping</a>
        <div class="order" style="display:none"></div>
  
    </section>
    
</div>

@endsection
