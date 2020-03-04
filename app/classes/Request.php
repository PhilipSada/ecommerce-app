<?php

namespace App\Classes;


class Request{

//to return all requests and storing them 

public static function all($is_array=false){

   $result=[];
    //this states that if count($_GET) is greater than zero elements that if there is a get/post request we store it inside the $result array
   if(count($_GET)>0) $result['get']=$_GET;
   if(count($_POST)>0) $result['post']=$_POST;
   $result['file']= $_FILES; //$_FILES is a php global variable (we used it so that we can store any file request inside the $result array)

   return json_decode(json_encode($result), $is_array);
}

//to get a specific request

public static function get($key){

    $object = new static;

    $data=$object->all();

    return $data->$key;
}

//to check request availability

public static function has($key){
     //array_key_exists is a php function that used to check if a key exists in an array used in the all(true) function defined above
     //because we are using a static function we use self:: but if non static it would be $this->
    return (array_key_exists($key, self::all(true))) ? true:false;
}

//get request data

public static function old($key, $value){

    $object = new static;

    $data = $object->all();
    //if $data->$key->$value is isset
    return isset($data->$key->$value) ? $data->$key->$value:'';
}
//refresh request
public static function refresh(){

    $_POST=[];
    $_GET=[];
    $_FILES=[];
}

}




?>