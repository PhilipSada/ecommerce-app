<?php

namespace App\Classes;


class Cart{
    
    protected static $isItemInCart = false;

    public static function add($request){

        try{
            $index = 0;
            //to check if there are item or items added to cart
            if(!Session::has('user_cart') || count(Session::get('user_cart'))<1){
                Session::add('user_cart', [
                    0=>['product_id'=>$request->product_id, 'quantity'=>1]
                ]);
            }else{
                 foreach($_SESSION['user_cart'] as $cart_Items){
                    $index++;
                    foreach($cart_Items as $key=>$value){
                        if($key =='product_id' && $value == $request->product_id){
                            //array_splice basically removes the item and replaces with a new array
                            //1 after the $index-1 refers to the length and it is one cause we just want to replace one specific item in the cart
                            //$index-1 is the offset/key
                            //the last [] is what we are using to replace the item
                            array_splice($_SESSION['user_cart'], $index-1, 1, array(
                                [
                                    'product_id'=>$request->product_id, 'quantity'=>$cart_Items['quantity']+1
                                ]
                            ));
                            //this means the specific item is in cart
                            self::$isItemInCart = true;
                        }

                    }

                }
                //to check if the specific item to be added is not already in the cart
                if(!self::$isItemInCart){
                    array_push($_SESSION['user_cart'], [
                        'product_id'=>$request->product_id, 'quantity'=>1
                    ]);
                }


            }

        }catch(\Exception $ex){
            echo $ex->getMessage();
        }
    }

    public static function removeItem($index){

        if(count(Session::get('user_cart'))<=1){
            //clear all items in cart
            self::clear();
            
        }else{
            unset($_SESSION['user_cart'][$index]);
            sort($_SESSION['user_cart']);
        }
    }

    public static function clear(){
        //to clear all items in cart
        Session::remove('user_cart');
    }
}

?>