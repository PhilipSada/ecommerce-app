@extends('admin.layout.base')

@section('title', 'Product Categories')

@section('data-page-id', 'adminCategories')

@section('content')
 
 <div class='category'>
    {{-- expanded is a class from zurb foundation --}}
    <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Product Categories</h2>
        
    </div>
    <div class='text-border'></div>
    {{--to show the message from the message blade file in the includes folder--}}
    @include('includes.message')



    <div class = 'grid-x'>
        <div class='cell small-12 medium-6'>
            <form method='POST'>
                <div class="grid-container">
                <div class="grid-x">
                    <div class="medium-12 cell">
                        <div class= 'input-group'>
                            <input type='text' class='input-group-field' placeholder="Search by name">
                            <div class='input-group-button'>
                                <input type='submit' class='button' value='search'>
                            </div>
                    </div>
                    </div>  
                </div>
                </div>
            </form>
        </div>
        <div class='cell small-12 medium-6'>
            <form action='/admin/product/categories' method='POST'>
                <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">
                        <div class= 'input-group'>
                            <input type='text' class='input-group-field' placeholder="Category name" name='name'>
                            <input type='hidden' name='token' value = "{{\App\Classes\CSRFTOKEN::_token()}}">
                            <div class='input-group-button'>
                                <input type='submit' class='button' value='Create'>
                            </div>
                    </div>
                    </div>  
                </div>
                </div>
            </form>
        </div>
    </div>

    <div class='grid-x ' style='margin:0 0.9rem'>
        <div class='cell small-12 medium-12'>
            @if(count($categories))

                <table class='hover unstriped' data-form="deleteForm">
                    <tbody>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Date created</th>
                                <th width='70'>Action</th>
                            </tr>
                        </thead>
                        @foreach($categories as $category)
                    
                                {{-- $categories defined in the productcategorycontroller.php and in the helper.php is an array so we can access the name, slug....like this --}}
                                <td>{{$category['name']}}</td>
                                <td>{{$category['slug']}}</td>
                                <td>{{$category['added']}}</td> 
                                <td width='70' class='text-right'>

                                    <span data-tooltip tabindex="2" title="Add Subcategory" class="left">
                                        <a data-open="add-subcategory-{{$category['id']}}"><i class='fa fa-plus'></i></a>
                                    </span>
                                    <span data-tooltip tabindex="2" title="Edit Category" class="left">
                                        <a data-open="item-{{$category['id']}}"><i class='fa fa-edit'></i></a>
                                    </span>
                                    {{-- delete category button from the delete-modal emanates --}}
                                    <span style="display:inline-block" data-tooltip tabindex="2" title="Delete Category" class="left">
                                        <form method="POST" action="/admin/product/categories/{{$category['id']}}/delete" class="delete-item">
                                            <input type='hidden' name='token' value = "{{\App\Classes\CSRFTOKEN::_token()}}">
                                            <button type="submit"><i class='fa fa-times delete'></i></button>
                                        </form>
                                    </span>
                                    {{-- when using ajax there is no need to add the name='name' input --}}
                                    {{-- edit category modal --}}
                                    <div class="reveal" id= "item-{{$category['id']}}" data-reveal data-close-on-click="false" 
                                    data-close-on-esc="false">
                                        <div class='notification callout primary'></div>
                                        <h2>Edit Category</h2>
                                        <form>
                                            <div class="grid-container">
                                            <div class="grid-x grid-padding-x">
                                                <div class="medium-12 cell">
                                                    <div class= 'input-group'>
                                                    <input type='text' id="item-name-{{$category['id']}}"  value="{{$category['name']}}">
                                                        <div>
                                                            <input type='submit' class='button update-category' id= "{{$category['id']}}"
                                                             data-token = "{{\App\Classes\CSRFTOKEN::_token()}}" value='update'>
                                                        </div>
                                                   </div>
                                                </div>  
                                            </div>
                                            </div>
                                        </form>
                                        <a href='/admin/product/categories' class="close-button" aria-label="Close modal" type="button">
                                          <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
                                    {{-- Add sub-category modal --}}
                                    <div class="reveal" id= "add-subcategory-{{$category['id']}}" data-reveal data-close-on-click="false" 
                                    data-close-on-esc="false">
                                        <div class='notification callout primary'></div>
                                        <h2>Add Subcategory</h2>
                                        <form>
                                            <div class="grid-container">
                                            <div class="grid-x grid-padding-x">
                                                <div class="medium-12 cell">
                                                    <div class= 'input-group'>
                                                    <input type='text' id="subcategory-name-{{$category['id']}}">
                                                    
                                                        <div>
                                                            <input type='submit' class='button add-subcategory' id= "{{$category['id']}}"
                                                            name='token' data-token = "{{\App\Classes\CSRFTOKEN::_token()}}" value='Create'>
                                                        </div>
                                                   </div>
                                                </div>  
                                            </div>
                                            </div>
                                        </form>
                                        <a href='/admin/product/categories' class="close-button" aria-label="Close modal" type="button">
                                          <span aria-hidden="true">&times;</span>
                                        </a>
                                    </div>
                                    {{-- end of sub-category modal --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{!! $links !!}</p>
            @else
             <h3>You have not created any category</h3>
            @endif
        </div>
    </div>
 </div>
 <div class='subcategory'>
    {{-- expanded is a class from zurb foundation --}}
    <div class='row expanded' style='margin:0 0.9rem'>
        <h2>Subcategories</h2>
        <div class='text-border'></div>
    </div>

    <div class='grid-x ' style='margin:0 0.9rem'>
        <div class='cell small-12 medium-12'>
            
            @if(count($subcategories))
                <table class='hover unstriped' data-form="deleteForm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Date created</th>
                            <th width='50'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subcategories as $subcategory)
                            <tr>
                                {{-- $categories defined in the productcategorycontroller.php and in the helper.php is an array so we can access the name, slug....like this --}}
                                <td>{{$subcategory['name']}}</td>
                                <td>{{$subcategory['slug']}}</td>
                                <td>{{$subcategory['added']}}</td> 
                                <td width='50' class='text-right'>
                                    <span data-tooltip tabindex="2" title="Edit Subcategory" class="left">
                                        <a data-open="item-subcategory-{{$subcategory['id']}}"><i class='fa fa-edit'></i></a>
                                    </span>
                                    {{-- delete subcategory button from the delete-modal emanates --}}
                                    <span style="display:inline-block" data-tooltip tabindex="2" title="Delete Subcategory" class="left">
                                        <form method="POST" action="/admin/product/subcategory/{{$subcategory['id']}}/delete" class="delete-item">
                                            <input type='hidden' name='token' value = "{{\App\Classes\CSRFTOKEN::_token()}}">
                                            <button type="submit"><i class='fa fa-times delete'></i></button>
                                        </form>
                                    </span>

                                    {{-- edit subcategory modal --}}
                                    <div class="reveal" id= "item-subcategory-{{$subcategory['id']}}" data-reveal data-close-on-click="false" 
                                        data-close-on-esc="false">
                                        <div class='notification callout primary'></div>
                                        <h2>Edit Subcategory</h2>
                                        <form>
                                            <div class="grid-container">
                                                <div class="grid-x grid-padding-x ">
                                                    <div class="medium-12 cell">
                                                        <div class= 'input-group'>
                                                        <input type='text' id="item-subcategory-name-{{$subcategory['id']}}" value="{{$subcategory['name']}}">
                                                       </div>
                                                    </div>
                                                   <div class='medium-12 cell'> 
                                                      <h5>Change Category </h5>
                                                      <div class='input group'>
                                                      
                                                      <select id="item-category-{{$subcategory['category_id']}}">
                                                            @foreach(\App\Models\Category::all() as $category)
                                                              @if($category->id == $subcategory['category_id'])
                                                               <option selected="selected" value="{{$category->id}}">{{$category->name}}</option>
                                                               
                                                              @endif
                                                              <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                      </select>
                                                
                                                    </div>
                                                  </div>
                                                  <div class='medium-12 cell'>
                                                    <div class='input group'>
                                                        <div>
                                                            <input type='submit' class='button update-subcategory' id= "{{$subcategory['id']}}"
                                                            data-category-id="{{$subcategory['category_id']}}" data-token = "{{\App\Classes\CSRFTOKEN::_token()}}" value='Update'>
                                                        </div>
                                                    </div>
                                                   </div>
                                                </div>  
                                            </div>
                                            
                                          </form>
                                        
                                           <a href='/admin/product/categories' class="close-button" aria-label="Close modal" type="button">
                                          <span aria-hidden="true">&times;</span>
                                           </a>
                                    </div>
                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p>{!! $subcategories_links !!}</p>
            @else
             <h3>You have not created any subcategory</h3>
            @endif
        </div>
    </div>
 </div>
@include('includes.delete-modal')
@endsection