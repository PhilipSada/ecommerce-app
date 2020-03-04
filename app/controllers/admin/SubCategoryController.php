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

class SubCategoryController extends BaseController{

    public function __construct()
    {
        if(!Role::middleware('admin')){
            Redirect::to('/login');
        }
    }


    public function store(){

        if(Request::has('post')){

            $request= Request::get('post');
            $extra_errors=[];
           
            //to check if the token present in the $request->token matches what is being saved in the session(token here is an input name given in categories.blade.php)
            if(CSRFToken::verifyCSRFToken($request->token, false)){
                //refering to the ValidateRequest php class
                //$rules refers to the $policies in the abide function
                $rules = [
                    'name'=> ['required'=>true, 'minLength'=>3, 'mixed'=> true],
                    'category_id'=>['required'=>true]
                ];
                //to check if we have the same subcategory name under the same category_id cause we can have the same subcategory name but not under the same category
                $duplicate_subcategory = SubCategory::where('name', $request->name)->where('category_id',$request->category_id)->exists();
                // $duplicated_subcategory = SubCategory::where('name',$request->name)->exists();
               

                if($duplicate_subcategory){
                    $extra_errors['name']= array('Subcategory already exists');
                }

                //to check if the category_id exists for the sub category to be created
                $category = Category::where('id', $request->category_id)->exists();
                if(!$category){
                    $extra_errors['name'] = array('Invalid Product Category');
                }

                $validate = new ValidateRequest;
                $validate->abide($_POST,$rules);

                if ($validate->hasError() || $duplicate_subcategory || !$category){
                    $errors = $validate->getErrorMessages();
                    //if there are extra errors, merge it with the existing errors
                    count($extra_errors) ? $response = array_merge($errors, $extra_errors) : $response = $errors;
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($response);
                    exit;
                    
                }
                // else if($duplicate_subcategory || !$category){
                //     $response = $extra_errors;
                //     header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                //     echo json_encode($response);
                //     exit;
                // }
                //process form data 
                //create is a reserved ORM function to insert/create data in the database

                SubCategory::create([
                        'name'=> $request->name,
                        'category_id'=> $request->category_id,
                        'slug'=> slug($request->name)
                    ]);
                    
                echo json_encode(['success'=>'Subcategory created successfully']);
                exit;
                
              
                
                
            }

            throw new \Exception('Token mismatch');
        }

    }
    public function edit($id)
    {
        if(Request::has('post')){
            $request = Request::get('post');
            $extra_errors = [];
            
            if(CSRFToken::verifyCSRFToken($request->token, false)){
                $rules = [
                    'name' => ['required' => true, 'minLength' => 3, 'mixed' => true],
                    'category_id' => ['required' => true]
                ];
    
                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);
    
                $duplicate_subcategory = SubCategory::where('name', $request->name)->where('category_id', $request->category_id)->exists();
                // $duplicate_subcategory = SubCategory::where('name', $request->name)->exists();
               
               
                 if($duplicate_subcategory){
                     $extra_errors['name'] = array('You have not made any changes');
                 }
                
                
                $category = Category::where('id', $request->category_id)->exists();
                if(!$category){
                    $extra_errors['name'] = array('No changes made');
                }
    
                if($validate->hasError() || $duplicate_subcategory){
                    $errors = $validate->getErrorMessages();
                    count($extra_errors) ? $response = array_merge($errors, $extra_errors) : $response = $errors;
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($response);
                    exit;
                }
                // else if($duplicate_subcategory){
                //     $response = $extra_errors;
                //     header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                //     echo json_encode($response);
                //     exit;
                // }
                
                SubCategory::where('id', $id)->update(
                    ['name' => $request->name, 'category_id' => $request->category_id]
                );
                echo json_encode(['success' => 'Subcategory Updated Successfully']);
                exit;
            }

            throw new \Exception('Token mismatch');
        }
        
        return null;
    }
    public function delete($id){

        if(Request::has('post')){

            $request= Request::get('post');
           
    
            if(CSRFToken::verifyCSRFToken($request->token)){
                SubCategory::destroy($id);
                Session::add('success', 'Subcategory deleted');
                Redirect::to('/admin/product/categories');    
            }
            
            throw new \Exception('Token mismatch');
        }


    }
}


?>