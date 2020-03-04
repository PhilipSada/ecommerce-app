<?php

namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Role;
use App\Classes\Session;
use App\Classes\UploadFile;
use App\Classes\ValidateRequest;
use App\Controllers\BaseController;
use App\Models\Category;

use App\Models\Product;
use App\Models\SubCategory;
use Exception;

class ProductController extends BaseController{

    public $table_name = 'products';
    public $categories;
    public $products;
   
    public $payments;
    public $subcategories;
    public $subcategories_links;
    public $links;
   


    public function __construct()
    {
        if(!Role::middleware('admin')){
            Redirect::to('/login');
        }
        
        $this->categories=Category::all();  //we can access the all function that we created in request.php because of the autoload property created in composer.json since the request.php has a namespace starting with 'App'
        $total = Product::all()->count();
       
        
           //we can do this because the paginate function defined in the helper php file returns to variables $categories and the links
        list($this->products, $this->links) = paginate(10, $total, $this->table_name, new Product);

       
   
        
    }
    

    public function show(){
       
        $products = $this->products;
        $links = $this->links;
        return view('admin/products/inventory', compact('products', 'links'));
    }


    Public function showEditProductForm($id){
        $product = Product::where('id', $id)->with(['category', 'subCategory'])->first();
        $categories = $this->categories;

        return view('admin/products/edit', compact('product', 'categories'));
    }

    public function showCreateProductForm(){
        $categories = $this->categories;
      return view('admin/products/create', compact('categories')); 
    }

    public function store(){

        if(Request::has('post')){

            $request= Request::get('post');
            $file_error=[];
           
            //to check if the token present in the $request->token matches what is being saved in the session(token here is an input name given in categories.blade.php)
            if(CSRFToken::verifyCSRFToken($request->token)){
                //refering to the ValidateRequest php class
                //$rules refers to the $policies in the abide function
                $rules = [
                    'name'=> ['required'=>true, 'minLength'=>3, 'maxLength'=>70, 'mixed'=>true, 'unique'=>$this->table_name],
                    'price'=> ['required'=>true, 'minLength'=>2, 'number'=>true],
                    'quantity'=> ['required'=>true],
                    //'category' is used and not 'category_id' cause in create.blade.php file under product category select options, the name='category'
                    'category'=> ['required'=>true],
                    'subcategory'=>['required'=>true],
                    'gender'=>['required'=>true],
                    'brand'=>['required'=>true],
                    'size'=>['number'=>true],
                    'featured'=>['number'=>true],
                    'description'=>['required'=>true, 'minLength'=>4, 'maxLength'=>500]
                ];


                $file = Request::get('file');
                isset($file->productImage->name) ? $filename = $file->productImage->name : $filename = '';

                if(empty($filename)){
                    $file_error['productImage'] = ['The Product image is required'];
                }elseif(!UploadFile::isImage($filename)){
                    $file_error['productImage'] = ['The Product image is invalid'];
                }


                $validate = new ValidateRequest;
                $validate->abide($_POST,$rules);

                if ($validate->hasError()){
                    $response = $validate->getErrorMessages();
                    count($file_error) ? $errors = array_merge($response, $file_error) : $errors = $response;
                    return view('admin/products/create', [
                        'categories'=>$this->categories,
                        'errors'=>$errors
                    ]);
                   
                    
                }

                //saving the productimage into the database
                $ds= DIRECTORY_SEPARATOR;
                //temporary location where php has uploaded the file to when we click on submit button
                $temp_file = $file->productImage->tmp_name;
                $image_path = UploadFile::move($temp_file, "images{$ds}uploads{$ds}products", $filename)->path();








                //process form data 
                //create is a reserved ORM function to insert/create data in the database
                Product::create([
                    'name'=> $request->name,
                    // 'slug'=> slug($request->name),
                    'price'=> $request->price,
                    'category_id'=> $request->category,
                    'sub_category_id'=> $request->subcategory,
                    'image_path'=> $image_path,
                    'description'=> $request->description,
                    'quantity'=> $request->quantity,
                    'gender'=>$request->gender,
                    'size'=>$request->size,
                    'brand'=>$request->brand,
                    'featured'=>$request->featured
                    
                ]);
                
                
                Request::refresh(); //this is to refresh the page once the product fields have been successfully created
   
                return view('admin/products/create', [
                    'categories'=>$this->categories,
                    'success'=>'Record created',
                ]); 
            }
            throw new \Exception('Token mismatch');
        }


    }
    public function edit($id){
        if(Request::has('post')){

            $request= Request::get('post');
            $file_error=[];
           
            //to check if the token present in the $request->token matches what is being saved in the session(token here is an input name given in categories.blade.php)
            if(CSRFToken::verifyCSRFToken($request->token)){
                //refering to the ValidateRequest php class
                //$rules refers to the $policies in the abide function
                $rules = [
                    'name'=> ['required'=>true, 'minLength'=>3, 'maxLength'=>70, 'mixed'=> true],
                    'price'=> ['required'=>true, 'minLength'=>2, 'number'=>true],
                    'quantity'=> ['required'=>true],
                    //'category' is used and not 'category_id' cause in edit.blade.php file, the name='category'
                    'category'=> ['required'=>true],
                    'subcategory'=>['required'=>true],
                    'gender'=>['required'=>true],
                    'brand'=>['required'=>true],
                    'size'=>['number'=>true],
                    'featured'=>['number'=>true],
                    'description'=>['required'=>true, 'minLength'=>4, 'maxLength'=>500]
                ];


                $file = Request::get('file');
                isset($file->productImage->name) ? $filename = $file->productImage->name : $filename = '';

                //this is to check if the new image the user is uploading is a valid image
               if(isset($file->productImage->name) && !UploadFile::isImage($filename)){
                    $file_error['productImage'] = ['The Product image is invalid'];
                }

                


                $validate = new ValidateRequest;
                $validate->abide($_POST,$rules);

                if ($validate->hasError()){
                    $response = $validate->getErrorMessages();
                    count($file_error) ? $errors = array_merge($response, $file_error) : $errors = $response;
                    return view('admin/products/create', [
                        'categories'=>$this->categories,
                        'errors'=>$errors
                    ]);
                   
                    
                }
                //findorfail method is from eloquent which helps to throw new exception if the product_id does not exists
                $product = Product::findOrFail($request->product_id);

                $product->name = $request->name;
                $product->price = $request->price;
                $product->category_id = $request->category;
                $product->sub_category_id = $request->subcategory;
                $product->description = $request->description;
                $product->brand = $request->brand;
                $product->size = $request->size;
                $product->gender = $request->gender;
                $product->featured = $request->featured;
                // $product->quantity = $request->quantity;

                //$filename shows that the user is changing the current image so if that happen the following below should occur
                if($filename){
                    //saving the productimage into the database
                  $ds= DIRECTORY_SEPARATOR;
                  //temporary location where php has uploaded the file to when we click on submit button
                  $temp_file = $file->productImage->tmp_name;
                //since the user is updating the image, we get the old image path then we unlink it
                  $old_image_path = BASE_PATH."{$ds}public{$ds}$product->image_path";
                  unlink($old_image_path);
                  //new path
                  $image_path = UploadFile::move($temp_file, "images{$ds}uploads{$ds}products", $filename)->path();
                  $product->image_path =$image_path;
                }
                
                
               //then we save the product
               $product->save();

               Session::add('success', 'Record Updated');
               Redirect::to('/admin/products');
            }
            // throw new \Exception('Token mismatch');
        }
    }
    public function delete($id){

        if(Request::has('post')){

            $request= Request::get('post');
           
    
            if(CSRFToken::verifyCSRFToken($request->token)){
                Product::destroy($id);

                Session::add('success', 'Product deleted');
                Redirect::to('/admin/products');    
            }
            
            throw new \Exception('Token mismatch');
        }


    }

    public function getSubcategories($id){
        //where category_id is equal to the $id passed in the url typed in admin_routes.php for this function
        //this helps to get all the subcategories that have category id's
        $subcategories = SubCategory::where('category_id', $id)->get();

        echo json_encode($subcategories);
        exit;

    }

  


}



?>