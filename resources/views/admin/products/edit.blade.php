@extends('admin.layout.base')

@section('title', 'Edit Product')

@section('data-page-id', 'adminProduct')

@section('content')
 
  <div class='add-product'>
      {{-- expanded is a class from zurb foundation --}}
      <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Edit {{$product->name}}</h2>
        
      </div>
       <div class='text-border'></div>
       {{--to show the message from the message blade file in the includes folder--}}
      @include('includes.message')
      {{-- the enctype used in this form allows files to be uploaded --}}
        <form method="POST" action="/admin/product/edit" enctype="multipart/form-data">
            <div class="grid-container">
              <div class="grid-x grid-padding-x">
                <div class="medium-6 cell">
                    {{-- {{\App\Classes\Request::old('post','name')}} is to preserve whatever the user types in the form even after the submission --}}
                  <label>Product Name:
                    <input type='text'  name="name"
                    value="{{$product->name}}">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Product Price:
                    <input type='text' name ='price'
                    value = "{{$product->price}}">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Product Brand:
                    <input type='text' name ='brand'
                    value = "{{$product->brand}}">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Gender:
                    <input type='text' name ='gender'
                    value = "{{$product->gender}}">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Featured (0 = No or 1= Yes):
                    <input type='text' name ='featured'
                    value = "{{$product->featured}}">
                  </label>
                </div>
                <div class="medium-6 cell">
                    
                  <label>Product Category:
                    <select name="category" id="product-category">
                        {{-- $product->category->id can be done because in productcontroller.php file in the showeditproductform function, $product was passed in the view() --}}
                        <option value="{{$product->category->id}} ">
                            {{$product->category->name}}
                        </option>

                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                  </label>
                </div>

                <div class="medium-6 cell">
                  <label>Product Subcategory:
                    <select name="subcategory" id="product-subcategory">
                      {{-- it is important to spell subCategory the way it was defined in product.php when defining the relationship subCategory() --}}
                      <option value="{{$product->subCategory->id}} ">
                          {{$product->subCategory->name}}
                      </option>
                  </select>
                  </label>
                </div>
                <div class="medium-6 cell">
                    
                  <label>Product Quantity:
                    <select name="quantity">
                        {{-- if there is a value stored use the value, if there is none let be an empty string --}}
                        <option value="{{$product->quantity}} ">
                            {{$product->quantity}}
                        </option>
                        @for($i=1; $i<=50; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                  </label>
                </div>

                <div class="medium-6 cell">
                  <br/>
                 <div class='input-group'>
                   <span class='input-group-label'>Product Image:</span>
                   <input type='file' name='productImage' class='input-group-field'>
                 </div>
                </div>
                <div class="small-12 cell">
                 
                   <label>Description:
                   <textarea name='description' placeholder='Description'>{{$product->description}}</textarea>
                  </label>
                  <input type='hidden' name='token' value="{{\App\classes\CSRFToken::_token()}}">
                  <input type='hidden' name='product_id' value="{{$product->id}}">
                  
                  <input class='button warning float-right' type='submit' value='Update Product'>
                 
                </div>
              </div>
            </div>
        </form>
       
    </div>
@endsection
