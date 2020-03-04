@extends('admin.layout.base')

@section('title', 'Manage Inventory')

@section('data-page-id', 'adminProduct')

@section('content')
 
 <div class='products'>
    {{-- expanded is a class from zurb foundation --}}
    <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Manage Inventory Items</h2>
        
    </div>
    <div class='text-border'></div>
    {{--to show the message from the message blade file in the includes folder--}}
    @include('includes.message')



    <div class = 'grid-x'>
        <div class='cell small-11' >
          <a href="/admin/product/create" class='button float-right'>
            <i class="fa fa-plus"></i>Add new product
          </a>
        </div>
      
    </div>

    <div class='grid-x ' style='margin:0 0.9rem'>
        <div class='cell small-12 medium-12'>
            @if(count($products))

                <table class='hover unstriped' data-form="deleteForm">
                    <tbody>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Brand</th>
                                <th>Size</th>
                                <th>Gender</th>
                                <th>Date created</th>
                                <th width='70'>Action</th>
                            </tr>
                        </thead>
                        @foreach($products as $product)
                           <tr>
                                
                                <td><img src="/{{$product['image_path']}}" alt="{{$product['name']}}" height="40" width="40"></td>
                                <td>{{$product['name']}}</td>
                                <td>{{$product['price']}}</td> 
                                <td>{{$product['quantity']}}</td> 
                                <td>{{$product['category_name']}}</td>
                                <td>{{$product['sub_category_name']}}</td>
                                <td>{{$product['brand']}}</td>
                                <td>{{$product['size']}}</td>
                                <td>{{$product['gender']}}</td>
                                <td>{{$product['added']}}</td> 
                                <td width='70' class='text-right'>

                                    <span data-tooltip tabindex="2" title="Edit product" class="left">
                                        <a href="/admin/product/{{$product['id']}}/edit"><i class='fa fa-edit'></i></a>
                                    </span>
                                    <span style="display:inline-block" data-tooltip tabindex="2" title="Delete Product" class="left">
                                        <form method="POST" action="/admin/product/{{$product['id']}}/delete" class="delete-item">
                                            <input type='hidden' name='token' value = "{{\App\Classes\CSRFTOKEN::_token()}}">
                                            <button type="submit"><i class='fa fa-times delete'></i></button>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{!! $links !!}</p>
            @else
             <h3>You do not have any product</h3>
            @endif
        </div>
    </div>
 </div>
 @include('includes.delete-modal')
@endsection