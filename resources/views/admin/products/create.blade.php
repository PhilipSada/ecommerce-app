@extends('admin.layout.base')

@section('title', 'Create Product')

@section('data-page-id', 'adminProduct')

@section('content')
 
  <div class='add-product'>
      {{-- expanded is a class from zurb foundation --}}
      <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Add Inventory Item</h2>
        
      </div>
       <div class='text-border'></div>
       {{--to show the message from the message blade file in the includes folder--}}
      @include('includes.message')
      {{-- the enctype used in this form allows files to be uploaded --}}
        <form method="POST" action="/admin/product/create" enctype="multipart/form-data">
            <div class="grid-container">
              <div class="grid-x grid-padding-x">
                <div class="medium-6 cell">
                    {{-- {{\App\Classes\Request::old('post','name')}} is to preserve whatever the user types in the form even after the submission --}}
                  <label>Product Name:
                    <input type='text' class='input-group-field' placeholder="Product name" name="name"
                    value="{{\App\Classes\Request::old('post','name')}}">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Product Price:
                    <input type='text' class='input-group-field' placeholder="Product Price" name ='price'
                    value = "{{\App\Classes\Request::old('post','price')}}">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Product Brand:
                    <input type='text' class='input-group-field' placeholder="Product Brand" name ='brand'
                    value = "{{\App\Classes\Request::old('post','brand')}}">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Gender:
                    <input type='text' class='input-group-field' placeholder="Gender" name ='gender'
                    value = "{{\App\Classes\Request::old('post','gender')}}">
                  </label>
                </div>
                <div class="medium-6 cell">
                  <label>Featured (0 = No or 1= Yes):
                    <input type='text' class='input-group-field' placeholder="Featured" name ='featured'
                    value = "{{\App\Classes\Request::old('post','featured')}}">
                  </label>
                </div>
                <div class="medium-6 cell">
                    
                  <label>Product Category:
                    <select name="category" id="product-category">
                        {{-- if there is a value stored use the value, if there is none let be an empty string --}}
                        <option value="{{\App\Classes\Request::old('post','name') ? : ''}} ">
                            {{\App\Classes\Request::old('post','name') ? : 'Select Category'}}
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
                      {{-- if there is a value stored use the value, if there is none let be an empty string --}}
                      <option value="{{\App\Classes\Request::old('post','name') ? : ''}} ">
                          {{\App\Classes\Request::old('post','subcategory') ? : 'Select Subcategory'}}
                      </option>
                  </select>
                  </label>
                </div>
                <div class="medium-6 cell">
                    
                  <label>Product Quantity:
                    <select name="quantity">
                        {{-- if there is a value stored use the value, if there is none let be an empty string --}}
                        <option value="{{\App\Classes\Request::old('post','name') ? : ''}} ">
                            {{\App\Classes\Request::old('post','quantity') ? : 'Select Product Quantity'}}
                        </option>
                        @for($i=1; $i<=50; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                  </label>
                </div>
                <div class="medium-6 cell">
                    
                  <label>Product Size:
                    <select name="size">
                        {{-- if there is a value stored use the value, if there is none let be an empty string --}}
                        <option value="{{\App\Classes\Request::old('post','name') ? : ''}} ">
                            {{\App\Classes\Request::old('post','size') ? : 'Select Product Size'}}
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
                   <textarea name='description' placeholder='Description'>{{\App\Classes\Request::old('post','description')}}</textarea>
                  </label>
                  <input type='hidden' name='token' value="{{\App\classes\CSRFToken::_token()}}">
                  <button class='button alert' type='reset'>Reset</button>
                  <input class='button success float-right' type='submit' value='Save Product'>
                 
                </div>
              </div>
            </div>
        </form>
  </div>
  @include('includes.delete-modal')
@endsection