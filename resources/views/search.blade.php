@extends('layout.app')
@section('title','Searchpage')
@section('data-page-id','search')

@section('content')

<div>
  
    {{-- <section class='hero'>
        <div class="hero-slider">
            <div><img class='slider-image' src="/images/cover.png" alt="Pheelfresh store"></div>
            <div><img class='slider-image' src="/images/cover.png" alt="Pheelfresh store"></div>
            <div><img class='slider-image' src="/images/cover.png" alt="Pheelfresh store"></div>
        </div>
        
    </section> --}}
    <section id="search">

        {{-- <div>
            @foreach($products as $product)
             <div>{{$product->name}}</div>
             <div><img src="/{{$product->image_path}}"></div>
            @endforeach
        </div> --}}
      
     
     <div class="similar-products" >
      @if(isset($products))
        <p style="text-transform:none !important">Results based on your search ("{{$_GET['search']}}")</p>
        {{--  <div><h2>Products you may like</h2></div>  --}}
        <div class="similarGrid">
            @foreach($products as $product)
                <div class="similarContainer">
                    <div class='similar-image-container'>
                        <a href="/product/{{$product->id}}">
                        <img src="/{{$product->image_path}}" alt="" class="similarImg"> 
                        </a>
                    </div>
                    <div class="similarText">
                        <h3> {{$product->name }}</h3>
                        <h3>${{$product->price}}</h3>
                        {{-- <a href="/product/{{$product->id}}" class="addToCart"><i class="fa fa-shopping-cart"></i></a> --}}
                    </div>
                </div> 
            @endforeach
        </div>
       @else
            <p style="text-transform:none !important">No product based on your search ("{{$_GET['search']}}") was found</p>
            <div><h2>Products you may like</h2></div>
            <div class="similarGrid">
                  @foreach($allProducts as $allProduct)
                    <div class="similarContainer">
                        <div class='similar-image-container'>
                            <a href="/product/{{$allProduct->id}}">
                            <img src="/{{$allProduct->image_path}}" alt="" class="similarImg"> 
                            </a>
                        </div>
                        <div class="similarText">
                            <h3> {{$allProduct->name }}</h3>
                            <h3>${{$allProduct->price}}</h3>
                            
                        </div>
                    </div> 
                @endforeach
            </div>
      </div>
     @endif
             
 </section>
   
</div>
 @endsection
