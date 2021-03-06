@extends('layout.app')

@section('title','men')
@section('data-page-id','product')

@section('content')
<h2 class="text-center" style="font-size:1.2rem !important">Get 70% discount off any shoe today only</h2>
<div class="main-hero-men">
    <nav aria-label="You are here:" role="navigation">
        <ul class="breadcrumbs">
          <li><a href="/" style="color:black">Home</a></li>
          <li style="color:black">Men</li>
        </ul>
   </nav>
   <h2>MEN</h2>
</div>
<div class="main-product-grid">
    <div class="main-product-container"><a href="/product/category/13">
        <div><img src="/images/menshoes.png"></div>
        <h4>Shop Shoes</h4>
    </a>
   </div>
    <div class="main-product-container"><a href="/product/category/1">
        <div><img src="/images/menbagpack.png"></div>
        <h4>Shop Bags</h4>
    </a></div>
    <div class="main-product-container"><a href="/product/category/9">
        <div><img src="/images/mentshirt1.png"></div>
        <h4>Shop Tops & T-shirts</h4>
    </a></div>
    <div class="main-product-container"><a href="/product/category/5">
        <div><img src="/images/menhoodie.png"></div>
        <h4>Shop Hoodies</h4>
    </a></div>
</div>


@endsection
