<?php

use App\Classes\Session;
use App\Models\User;
use Philo\Blade\Blade;
use voku\helper\Paginator;
use Illuminate\Database\Capsule\Manager as Capsule;


// require __DIR__ .'/../../vendor/autoload.php';


function view($path, array $data=[]){
    
    $view = __DIR__ .'/../../resources/views';
    $cache = __DIR__ .'/../../bootstrap/cache';

    $blade = new Blade($view, $cache);

    echo $blade->view()->make($path,$data)->render();

}


//this function is to help with $this->mail->Body in the Mail class created in Mail.php
function make($filename, $data){

    extract($data);
    //turn on output buffering
    ob_start(); //this is to store the data in an internal buffer and not the browser

    //include the template
    include(__DIR__ .'/../../resources/views/emails/' .$filename .'.php');

    //to get the contents out of the file

    $content = ob_get_contents();

    //erase the content and turn off output buffering
    ob_end_clean();

    return $content;
}

function slug($value){
//the preg_replace function below just means anything not in the first parameter should be replaced with an empty string (pL=letter, pN=Number s=white space) then the value is converted to lowercase
//the pre_quote function is just used to quote regular expressions so that it doesn't get mixed up and result in an error
    //remove all characters not in the list(that what this means when we include "empty string")
    $value = preg_replace('![^'.preg_quote('_').'\pL\pN\s]+!u','',mb_strtolower($value));

    //replace underscore with a dash
    $value = preg_replace('!['.preg_quote('_').'\s]+!u','-',$value);

    //remove whitespace with the trim function
    //'-' was added as an argument so that the trim function does not remove it too

    return trim($value, '-');

}

function paginate($num_of_records, $total_record, $table_name, $object){
   
    $pages = new Paginator($num_of_records, 'p');
    $pages->set_total($total_record);

    $data = Capsule::select("SELECT * FROM $table_name WHERE deleted_at is null ORDER BY created_at DESC " . $pages->get_limit());

    //transform function was defined in the Category.php file
    //we can do $object->transform($data) because $object was the variable used to defined the new Category class in productcategorycontroller.php file
    $categories = $object->transform($data);

    return [$categories, $pages->page_links()];
}

//to check whether a user is logged in or not
function isAuthenticated(){
    return Session::has('SESSION_USER_NAME') ? true:false;
}

//to get the user's information from the database
function user(){

    if(isAuthenticated()){
        return User::findOrFail(Session::get('SESSION_USER_ID'));
    }

    return false;
}
function convertMoneyToCents($value){
    //to replace commas with an empty string and this should be looked for in $value
    $value = preg_replace("/\,/i","",$value);

    //to remove anything that is not a number, a dot or dash and replace it with an empty string
    $value = preg_replace("/([^0-9\.\-])/i", "", $value);

    if(!is_numeric($value)){
        return 0.00;
    }

    $value = (float) $value;
    return round($value, 2) * 100;
}

// function cartItem(){

//     if(Session::has('user_cart')){

//         $number = count(Session::get('user_cart'));

//         foreach($_SESSION['user_cart'] as $cart_Items){
//             $quantity = $cart_Items['quantity'];

//             return $quantity * $number;
//         }
//     }
// }

?>