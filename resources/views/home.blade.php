@extends('layout.app')
@section('title','Homepage')
@section('data-page-id','home')

@section('content')

<div class="home">
  
    <section class='hero-container'>
        <div class="hero-slider-info">
            <div><img class='slider-image' src="/images/frontcover17.png" alt="Pheelfresh store"></div>
            {{-- <div><img class='slider-image' src="/images/frontcover17.png" alt="Pheelfresh store"></div>
            <div><img class='slider-image' src="/images/frontcover17.png" alt="Pheelfresh store"></div> --}}
        </div>
        
    </section>
   
    <section id="root">
      {{-- <div class="discount"><img src="/images/discount.png"></div> --}}
      {{-- <div class="hero-group">
        <div class="hero-grid">
          <div class='hero-container'>
              <div class="hero-image-container">
              <a href=""><img src="/images/womenlink.png" alt="" class="hero-image"> </a>
              </div>
              <div class='hero-grid-a'>
                <h3> Cool shoes for men</h3>
                <h3><a href="">Shop now</a></h3>
              </div>
          </div>
          <div class='hero-container'>
              <div class="hero-image-container">
              <a href=""><img src="/images/mens-layering.png" alt="" class="hero-image"> </a>
              </div>
              <div class='hero-grid-a'>
                <h3> Cool shoes for men</h3>
                <h3><a href="">Shop now</a></h3>
              </div>
          </div>
        </div>
      </div> --}}
      <div class="featured-products" data-token="{{$token}}">
          <h2>Featured Products</h2>
          {{-- v-for is needed for do a for-loop with vuejs then adding : to href/src is for url binding --}}
          <div v-bind:class="{featured:featuredGrid}">
            <div v-cloak v-for="feature in featured">
                <div v-bind:class="{productContainer:productContainer}">
                  <div class='product-image-container'>
                    <a :href="'/product/' + feature.id">
                      <img :src="'/'+ feature.image_path" alt="" v-bind:class="{productImg:productImg}"> 
                  </a>
                  </div>
                  <div class='product-grid-a'>
                    <h3> @{{ stringLimit(feature.name, 18) }}</h3>
                    <h3>	$@{{feature.price}}</h3>
                    {{-- <button v-if="feature.quantity > 0" v-on:click = "addItemToCart(feature.id)" v-bind:class="{addCart:addCart}"></a>
                    <button v-else  v-bind:class="{addCart:addCart}">Out of stock</a> --}}
                  </div>
                </div>
            </div> 
          </div> 
         <div class="product-picks">
            <h2>Product Picks</h2>
            {{-- v-for is needed for do a for-loop with vuejs then adding : to href/src is for url binding --}}
            <div v-bind:class="{featured:featuredGrid}">
              <div v-cloak v-for="product in products">
                <div v-bind:class="{productContainer:productContainer}">
                  <div class='product-image-container'>
                    <a :href="'/product/' + product.id">
                      <img :src="'/'+ product.image_path" alt="" v-bind:class="{productImg:productImg}"> 
                  </a>
                  </div>
                  <div v-bind:class="{productText:productText}">
                    <h3> @{{ stringLimit(product.name, 18) }}</h3>
                    <h3>$@{{product.price}}</h3>
                    {{-- <button v-if="product.quantity > 0" v-on:click= "addItemToCart(product.id)" v-bind:class="{addCart:addCart}"></button>
                    <button v-else v-bind:class="{addCart:addCart}">Out of stock</button> --}}
                  </div>
                </div> 
              </div> 
          </div> 
        </div>

        <div class="text-center" style="margin-top:4rem;">
          <i v-show="loading" class="fa fa-spinner fa-spin" style="font-size:3rem; padding-bottom:3rem; position:fixed; top:60%; bottom:20%; color:black;"></i>
        </div>
   </div>
    </section>
    
</div>

@endsection
