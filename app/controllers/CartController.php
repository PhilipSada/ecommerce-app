<?php

namespace App\Controllers;

use App\Classes\Cart;
use App\Classes\CSRFToken;
use App\Classes\Mail;
use App\Classes\Request;
use App\Classes\Session;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Exception;
use Stripe\Charge;
use Stripe\Customer;

class CartController extends BaseController{

    public function show(){

        view('cart');
    }

    public function addItem(){

        if(Request::has('post')){
            $request = Request::get('post');

            if(CSRFToken::verifyCSRFToken($request->token, false)){

                if(!$request->product_id){

                    throw new \Exception('Malicious Activity');
                }

                Cart::add($request);
                
                echo json_encode(['success'=>'Product added to cart successfully, click on the cart icon on the navbar to initiate the checkout process']);
                exit;

            }
        }
    }

    public function getCartItems(){

       try{
            $result = array();
            $cartTotal = 0;

            if(!Session::has('user_cart') || count(Session::get('user_cart'))<1){

                echo json_encode(['fail'=>'No item in the cart']);
                exit;

            }
            $index = 0;

            

            foreach($_SESSION['user_cart'] as $cart_Items){
                $productId = $cart_Items['product_id'];
                $quantity = $cart_Items['quantity'];
                
                $item = Product::where('id', $productId)->first();

                if(!$item){
                    //this means skip the item if the id's don't match 
                    continue;
                }

                $totalPrice = $item->price * $quantity;
                $cartTotal =$totalPrice + $cartTotal;

                $totalPrice = number_format($totalPrice,2);

                array_push($result, [
                    'id'=>$item->id,
                    'name'=>$item->name,
                    'image'=>$item->image_path,
                    'description'=>$item->description,
                    'price'=>$item->price,
                    'totalPrice'=>$totalPrice,
                    'quantity'=> $quantity,
                    'stock'=>$item->quantity,
                    'index'=>$index
                ]);

                $index++;
            }

            $cartTotal= number_format($cartTotal, 2);
            Session::add('cartTotal', $cartTotal);
            echo json_encode(['items'=>$result, 'cartTotal'=>$cartTotal, 'authenticated'=>isAuthenticated(),
            'amountInCents'=>convertMoneyToCents($cartTotal)]);
            exit;

       }
       catch(\Exception $ex){

            //log this in database

       }
    }

    public function updateQuantity(){
        if(Request::has('post')){
            $request = Request::get('post');

            

            if(!$request->product_id){

              throw new \Exception('Malicious Activity');
            }

            $index=0;
            $quantity='';
            foreach($_SESSION['user_cart'] as $cart_Items){

                $index++;

                foreach($cart_Items as $key =>$value){
                    if($key=='product_id' && $value==$request->product_id){
                        switch($request->operator){
                            case '+':
                                $quantity = $cart_Items['quantity'] + 1;
                            break;
                            case '-':
                                $quantity = $cart_Items['quantity'] - 1;
                                if($quantity < 1){
                                    $quantity = 1;
                                }
                            break;
                        }
                        array_splice($_SESSION['user_cart'], $index-1, 1, array(
                            [
                                'product_id'=>$request->product_id, 'quantity'=>$quantity
                            ]
                        ));
                    }
                }
            }


            
        }

    }

    public function removeItem(){
        if(Request::has('post')){
            $request = Request::get('post');

           

            if($request->item_index === ''){

              throw new \Exception('Malicious Activity');
            }

            //remove item
            Cart::removeItem($request->item_index);
            echo json_encode(['success'=>'Product removed from cart']);

            exit;

            
        }

    }

    public function checkout(){

        if(Request::has('post')){
            $result['product'] = array();
            $result['order_no'] = array();
            $result['total'] = array();
            $request = Request::get('post');
            $token = $request->stripeToken;
            $email = $request->stripeEmail;

            try{
                //for stripe to create a new customer
                $customer = Customer::create([
                    'email'=>$email,
                    'source'=>$token
                ]);

                //to charge the customer
                $amount = convertMoneyToCents(Session::get('cartTotal'));
                $charge = Charge::create([
                    'customer'=>$customer->id,
                    'amount'=>$amount,
                    'description'=>user()->fullname.'-cart purchase',
                    'currency'=>'usd'
                ]);
                
                $order_id = strtoupper(uniqid());//this is to generate an order id

                foreach($_SESSION['user_cart'] as $cart_Items){
                    $productId = $cart_Items['product_id'];
                    $quantity = $cart_Items['quantity'];
                    
                    $item = Product::where('id', $productId)->first();
    
                    if(!$item){
                        //this means skip the item if the id's don't match 
                        continue;
                    }
    
                    $totalPrice = $item->price * $quantity;
    
                    $totalPrice = number_format($totalPrice,2);

                    //store info in database
                    Order::create([
                        'user_id'=>user()->id,
                        'product_id'=>$productId,
                        'unit_price'=>$item->price,
                        'status'=>'pending',
                        'quantity'=>$quantity,
                        'total'=>$totalPrice,
                        'order_no'=>$order_id
                    ]);
                    //this is cause as orders are made the quantity of products in store is reducing
                    $item->quantity = $item->quantity-$quantity;
                    $item->save();
                        //this is needed when we want to send a purchase confirmation email to the user
                    array_push($result['product'], [
                        'name'=>$item->name,
                        'price'=>$item->price,
                        'total'=>$totalPrice,
                        'quantity'=> $quantity
                        
                        
                    ]);


    
                }
                //not the string "user_id" and the others have to match the titles given in the database
                Payment::create([
                    'user_id'=>user()->id,
                    'amount'=>$charge->amount,
                    'status'=>$charge->status,
                    'order_no'=>$order_id

                ]);

                

                $result['order_no'] = $order_id;
                $result['total'] = Session::get('cartTotal');


                
                //sending the purchase confirmation email
                $data= [
                    'to'=> user()->email,
                    'subject'=>'Order Confirmation',
                    'view'=>'purchase',
                    'name'=>user()->fullname,
                    'body'=>$result
                ];
                
                (new Mail())->send($data);

              
                

            }catch(\Exception $ex){
                echo $ex->getMessage();
            }

            
            Cart::clear();
            echo json_encode(['success'=>'Thank you, we have received your payment and now processing your order']);
            exit;
        }
    }

 public function paymentConfirmation(){

    view('confirmation');
 }

    
    
}






?>