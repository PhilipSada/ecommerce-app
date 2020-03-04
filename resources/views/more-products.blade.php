@extends('layout.app')

@section('title','shoes')
@section('data-page-id','product')

@section('content')

<div class="product" id="moreProducts" data-token="{{$token}}" data-id="{{$moreProduct->sub_category_id}}">
     <nav aria-label="You are here:" role="navigation">
        <ul class="breadcrumbs">
          <li><a href="/" style="color:black">Home</a></li>
          <li style="color:black">{{$moreProduct->subcategory->name}}</li>
        </ul>
     </nav>
      <div class="similar-products" >
                <h2>{{$moreProduct->subcategory->name}}</h2>
            <div class="option-group">
                <div class="select">
                    <select id="brand-select">
                    <option value="default">Select a brand</option>
                    <option value="all">All Brands</option>
                    <option value="nike">Nike</option>
                    <option value="jordan">Jordan</option>
                    </select>
                </div>
                <div class="select">
                    <select id="filter-select">
                    <option value="noSelect">No Price Range Selected</option>
                    <option value="lowHigh">Price:low to high</option>
                    <option value="highLow">Price: high to low</option>
                    <option value="clearFilter">Clear filter</option>
                    </select>
                </div>
                {{-- <div><button class="asc-button">Price: low to high</button> </div>  
                <div><button class="dsc-button">Price: high to low </button> </div>
                <div><button class="clear-button">Clear filter</button></div>      --}}
            </div>
            <div class="no-products" style="display:none"></div>
            {{-- <div v-bind:class="{similarGrid:similarGrid}">
                <div v-for="similar in jordanMen">
                    <div v-bind:class="{similarContainer:similarContainer}">
                        <div class='similar-image-container'>
                            <a :href="'/product/' + similar.id">
                            <img :src="'/'+ similar.image_path" alt="" v-bind:class="{similarImg:similarImg}"> 
                            </a>
                        </div>
                        <div v-bind:class="{similarText:similarText}">
                            <h3> @{{similar.name}}</h3>
                            <h3>$@{{similar.price}}</h3>
                            <button v-if="similar.quantity > 0" @click.prevent = "addItemToCart(similar.id)" v-bind:class="{addToCart:addToCart}"><i class="fa fa-shopping-cart"></i></button>
                            <button v-else v-bind:class="{addToCart:addToCart}">Out of stock</button>
                        </div>
                    </div> 
                </div> 
            </div>  --}}
            <div v-bind:class="{similarGrid:similarGrid}">
                
                <div v-cloak v-for="similar in allMen">
                    
                    <div v-bind:class="{similarContainer:similarContainer}">
                        <div class='similar-image-container'>
                            <a :href="'/product/' + similar.id">
                            <img :src="'/'+ similar.image_path" alt="" v-bind:class="{similarImg:similarImg}"> 
                            </a>
                        </div>
                        <div v-bind:class="{similarText:similarText}">
                            <h3> @{{similar.name}}</h3>
                            <h3>$@{{similar.price}}</h3>
                            {{-- <button v-if="similar.quantity > 0" @click.prevent = "addItemToCart(similar.id)" v-bind:class="{addToCart:addToCart}"><i class="fa fa-shopping-cart"></i></button>
                            <button v-else v-bind:class="{addToCart:addToCart}">Out of stock</button> --}}
                        </div>
                    </div> 
                </div> 
            </div> 
            <div v-bind:class="{similarGrid:similarGrid}">
                
                <div v-cloak v-for="similar in allWomen">
                    
                    <div v-bind:class="{similarContainer:similarContainer}">
                        <div class='similar-image-container'>
                            <a :href="'/product/' + similar.id">
                            <img :src="'/'+ similar.image_path" alt="" v-bind:class="{similarImg:similarImg}"> 
                            </a>
                        </div>
                        <div v-bind:class="{similarText:similarText}">
                            <h3> @{{similar.name}}</h3>
                            <h3>$@{{similar.price}}</h3>
                            {{-- <button v-if="similar.quantity > 0" @click.prevent = "addItemToCart(similar.id)" v-bind:class="{addToCart:addToCart}"><i class="fa fa-shopping-cart"></i></button>
                            <button v-else v-bind:class="{addToCart:addToCart}">Out of stock</button> --}}
                        </div>
                    </div> 
                </div> 
            </div> 
      </div>
      <div class="text-center" style="margin-top:4rem;">
        <i v-show="loading" class="fa fa-spinner fa-spin" style="font-size:3rem; padding-bottom:3rem; position:fixed; top:60%; bottom:20%; color:black;"></i>
      </div>    
  </div>

@endsection
