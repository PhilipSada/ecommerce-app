<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Models\Product;

class SearchController extends BaseController{

    public function search(){
       
        $request = Request::get('get');
        $search = $request->search;
        $trimSearch = trim($search);
        $allProducts = Product::all();
        $products = Product::where('name', 'like', '%'.$trimSearch.'%')->get();
      
        $find = Product::find($trimSearch);
        $checkProducts = $find->name;
  
        if(count($products)>0){
            return view('search', compact('products', 'trimSearch'));

        }else
        return view('search', compact('allProducts','checkProducts', 'find'));
       
        
       
        

        
        


        
    }

  
    
}

?>