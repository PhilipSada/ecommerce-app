<?php

namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Role;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\SubCategory;

class ProductCategoryController extends BaseController{

    public $table_name = 'categories';
    public $categories;
    public $subcategories;
    public $subcategories_links;
    public $links;

    public function __construct()
    {
        if(!Role::middleware('admin')){
            Redirect::to('/login');
        }
        
        $total=Category::all()->count();  //we can access the all function that we created in request.php because of the autoload property created in composer.json since the request.php has a namespace starting with 'App'
        $subtotal=SubCategory::all()->count();  //we can access the all function that we created in request.php because of the autoload property created in composer.json since the request.php has a namespace starting with 'App'
     
        $object= new Category;
           //we can do this because the paginate function defined in the helper php file returns to variables $categories and the links
        list($this->categories, $this->links) = paginate(2, $total, $this->table_name, $object);

        list($this->subcategories, $this->subcategories_links) = paginate(14, $subtotal, 'sub_categories', new SubCategory);
   
        
    }
    //this was used so that we don't query the database anytime we want to carry out pagination
    public function show(){
      return view('admin/products/categories', [
          'categories'=>$this->categories,
          'links'=>$this->links,
          'subcategories'=>$this->subcategories,
          'subcategories_links'=>$this->subcategories_links
      ]); 
    }

    public function store(){

        if(Request::has('post')){

            $request= Request::get('post');
           
            //to check if the token present in the $request->token matches what is being saved in the session(token here is an input name given in categories.blade.php)
            if(CSRFToken::verifyCSRFToken($request->token)){
                //refering to the ValidateRequest php class
                //$rules refers to the $policies in the abide function
                $rules = [
                    'name'=> ['required'=>true, 'minLength'=>3, 'string'=> true, 'unique'=>'categories']
                ];


                $validate = new ValidateRequest;
                $validate->abide($_POST,$rules);

                if ($validate->hasError()){
                    $errors = $validate->getErrorMessages();
                    return view('admin/products/categories', [
                        
                        'categories'=>$this->categories,
                        'links'=>$this->links,
                        'errors'=>$errors,
                        'subcategories'=>$this->subcategories,
                        'subcategories_links'=>$this->subcategories_links
                    ]);
                    
                }
                //process form data 
                //create is a reserved ORM function to insert/create data in the database
                Category::create([
                    'name'=> $request->name,
                    'slug'=> slug($request->name)
                ]);
                $total=Category::all()->count();
                $subtotal=SubCategory::all()->count();

                list($this->categories, $this->links) = paginate(2, $total, $this->table_name, new Category);
                list($this->subcategories, $this->subcategories_links) = paginate(14, $subtotal, 'sub_categories', new SubCategory);
   
                return view('admin/products/categories', [
                    'categories'=>$this->categories,
                    'links'=>$this->links,
                    'success'=>'category created',
                    'subcategories'=>$this->subcategories,
                    'subcategories_links'=>$this->subcategories_links
                ]); 
            }
            throw new \Exception('Token mismatch');
        }


    }
    public function edit($id){

        if(Request::has('post')){

            $request= Request::get('post');
           
            //to check if the token present in the $request->token matches what is being saved in the session(token here is an input name given in categories.blade.php)
            if(CSRFToken::verifyCSRFToken($request->token, false)){
                //refering to the ValidateRequest php class
                //$rules refers to the $policies in the abide function
                $rules = [
                    'name'=> ['required'=>true, 'minLength'=>3, 'string'=> true, 'unique'=>'categories']
                ];


                $validate = new ValidateRequest;
                $validate->abide($_POST,$rules);

                if ($validate->hasError()){
                    $errors = $validate->getErrorMessages();
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($errors);
                    exit;
                    
                }

                Category::where('id', $id)->update(['name'=>$request->name]);
                echo json_encode(['success'=>'Record Update Successfully']);
                exit;
                
            }
            throw new \Exception('Token mismatch');
        }


    }
    public function delete($id){

        if(Request::has('post')){

            $request= Request::get('post');
           
    
            if(CSRFToken::verifyCSRFToken($request->token)){
                Category::destroy($id);

                //to check where the category_id is equal to the id of the category that was just deleted
                $subcategories = SubCategory::where('category_id', $id)->get();

                if(count($subcategories)){
                    foreach($subcategories as $subcategory){
                        $subcategory->delete();
                    }
                }
                Session::add('success', 'Category deleted');
                Redirect::to('/admin/product/categories');    
            }
            
            throw new \Exception('Token mismatch');
        }


    }
}



?>