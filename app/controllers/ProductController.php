<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Models\Product;

class ProductController extends BaseController{

    public function showMenMainPage(){
        return view('men-products');
    }
    public function showWomenMainPage(){
        return view('women-products');
    }

    public function show($id){

        $token = CSRFToken::_token();

        $product = Product::where('id', $id)->first();
        
        return view('product', compact('token', 'product'));
        
    }

    public function get($id){

        $product = Product::where('id', $id)->with(['category', 'subCategory'])->first();

        if($product){

            $similar_products = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->inRandomOrder()->limit(8)->get();

            echo json_encode(['product'=> $product, 'category'=>$product->category, 'subcategory'=>$product->subcategory,
            'similarProduct'=>$similar_products]);
            exit;
        }

        header('HTTP/1.1 422 Unprocessable Entity', true, 422);
        echo 'Product not found';
        exit;
    }

    public function showMore($id){

        $token = CSRFToken::_token();

        $moreProduct = Product::where('sub_category_id', $id)->first();
        
        return view('more-products', compact('token', 'moreProduct'));
        
    }

    public function getMore($id){

        // $wholeProduct = Product::where('id', $id)->with(['category', 'subCategory'])->first();
        $allWomen = Product::where('sub_category_id', $id)->where('gender', 'women')->get();
        $allMen = Product::where('sub_category_id', $id)->where('gender', 'men')->get();
        $nikeWomen =Product::where('sub_category_id', $id)->where('gender','women')->where('brand', 'nike')->get();
        $nikeMen =Product::where('sub_category_id', $id)->where('gender', 'men')->where('brand', 'nike')->get();
        $jordanMen =Product::where('sub_category_id', $id)->where('gender', 'men')->where('brand', 'jordan')->get();
        $jordanWomen =Product::where('sub_category_id', $id)->where('gender', 'women')->where('brand', 'jordan')->get();


        $ascMenSorted = $allMen->sortBy('price');
        $ascWomenSorted = $allWomen->sortBy('price');
        $ascAllWomen = $ascWomenSorted->values()->all();
        $ascAllMen = $ascMenSorted->values()->all();

        $dscMenSorted = $allMen->sortByDesc('price');
        $dscWomenSorted = $allWomen->sortByDesc('price');
        $dscAllWomen = $dscWomenSorted->values()->all();
        $dscAllMen = $dscMenSorted->values()->all();

        $ascJordanMenSorted = $jordanMen->sortBy('price');
        $ascJordanWomenSorted = $jordanWomen->sortBy('price');
        $ascJordanWomen = $ascJordanWomenSorted->values()->all();
        $ascJordanMen = $ascJordanMenSorted->values()->all();

        $ascNikeMenSorted = $nikeMen->sortBy('price');
        $ascNikeWomenSorted = $nikeWomen->sortBy('price');
        $ascNikeWomen = $ascNikeWomenSorted->values()->all();
        $ascNikeMen = $ascNikeMenSorted->values()->all();

        $dscJordanMenSorted = $jordanMen->sortByDesc('price');
        $dscJordanWomenSorted = $jordanWomen->sortByDesc('price');
        $dscJordanWomen = $dscJordanWomenSorted->values()->all();
        $dscJordanMen = $dscJordanMenSorted->values()->all();

        $dscNikeMenSorted = $nikeMen->sortByDesc('price');
        $dscNikeWomenSorted = $nikeWomen->sortByDesc('price');
        $dscNikeWomen = $dscNikeWomenSorted->values()->all();
        $dscNikeMen = $dscNikeMenSorted->values()->all();

        
         if($allWomen || $allMen || $nikeWomen || $nikeMen ||$jordanMen ||$jordanWomen){
             echo json_encode(['allWomen'=>$allWomen, 'allMen'=>$allMen, 
            'nikeWomen'=>$nikeWomen, 'nikeMen'=>$nikeMen, 'jordanMen'=>$jordanMen, 'jordanWomen'=>$jordanWomen,
            'jordanMenCount'=>count($jordanMen),'nikeMenCount'=>count($nikeMen), 'jordanWomenCount'=>count($jordanWomen),
            'nikeWomenCount'=>count($nikeWomen), 'ascAllMen'=> $ascAllMen, 'ascAllWomen'=> $ascAllWomen, 'dscAllWomen'=>$dscAllWomen,
            'dscAllMen'=>$dscAllMen, 'ascJordanMen'=>$ascJordanMen, 'ascJordanWomen'=>$ascJordanWomen, 'dscJordanMen'=>$dscJordanMen,
            'dscJordanWomen'=>$dscJordanWomen, 'dscNikeMen'=>$dscNikeMen, 'dscNikeWomen'=>$dscNikeWomen,'ascNikeMen'=>$ascNikeMen,
             'ascNikeWomen'=>$ascNikeWomen]);
            exit;
         }

        //do if statement for the error
        header('HTTP/1.1 422 Unprocessable Entity', true, 422);
        echo 'Product not found';
        exit;
    }
    
}

?>