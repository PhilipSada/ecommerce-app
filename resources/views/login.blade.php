@extends('layout.app')

@section('title', 'Log into Your Account') 
@section('data-page-id','auth')

@section('content')


  
<div class="auth" id="auth">
      
    <section class="login_form">
        <div class="grid-x align-center" style='margin:0 0.9rem'>
            <div class="cell small-12 medium-7">
                <h2 class="text-center">Login</h2>
                @include('includes.message')
                <form action="/login" method="POST">
                    
                    <input type="email" name="email" placeholder="Your Email Address" value="{{\App\Classes\Request::old('post', 'email')}}">
                    <input type="password" name="password" placeholder="Your Password">
                    
                    <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                    <button class="button float-right" style=" background-color:rgba(0, 0, 0, 0.89);">Login</button>
                </form>
                <p>Not registered? <a href="/register" style="color:rgba(0, 0, 0, 0.89); border-bottom:1px solid rgba(0, 0, 0, 0.89);">Register here</a></p>
            </div>
        </div>

    </section>
   
</div>

@endsection