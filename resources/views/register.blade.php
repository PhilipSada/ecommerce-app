@extends('layout.app')

@section('title', 'Register Free Account') 
@section('data-page-id','auth')

@section('content')


  
<div class="auth" id="auth">
      
    <section class="register_form">
        <div class="grid-x align-center" style='margin:0 0.9rem'>
            <div class="cell small-12 medium-7">
                <h2 class="text-center">Create Account</h2>
                @include('includes.message')
                <form action="/register" method="POST">
                    <input type="text" name="fullname" placeholder="Your name" value="{{\App\Classes\Request::old('post', 'fullname')}}">
                    <input type="email" name="email" placeholder="Your Email Address" value="{{\App\Classes\Request::old('post', 'email')}}">
                    <input type="text" name="username" placeholder="Your Username" value="{{\App\Classes\Request::old('post', 'username')}}">
                    <input type="password" name="password" placeholder="Your Password">
                    <textarea name="address" placeholder="Your Address" value="{{\App\Classes\Request::old('post', 'address')}}"></textarea>
                    <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                    <button class="button float-right" style=" background-color:rgba(0, 0, 0, 0.89);">Register</button>
                </form>
                <p>Already registered? <a href="/login" style="color:rgba(0, 0, 0, 0.89); border-bottom:1px solid rgba(0, 0, 0, 0.89);">Login here</a></p>
            </div>
        </div>

    </section>
   
</div>

@endsection
