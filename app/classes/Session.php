<?php

namespace App\Classes;

class Session{


    //public static function was used so that it can be accessed without instantiating the class as this is good for constants

    //create session

    public static function add($name, $value){

        if($name!='' && !empty($name) && $value !='' && !empty($value)){
            return $_SESSION[$name]=$value;
        }

        throw new \Exception('Name and value required');
    }
    //get value from session

    public static function get($name){

        return $_SESSION[$name];
    }
    //check if session exists
    public static function has($name){
        if($name!='' && !empty($name)){
            return (isset($_SESSION[$name])) ? true:false;
        }

        throw new \Exception('Name is required');
    }
    //remove session
    //has() function that was created above was use with 'self' for checking if session exists so that it could be removed
    public static function remove($name){
        if(self::has($name)){
            unset($_SESSION[$name]);
        }
    }

    public static function flash($name, $value=null){
        //if key($name) passed in is in session (if(self::has($name)))
        if(self::has($name)){
            //to get the value already stored in the session
            $old_value = self::get($name);
            //then remove the key($name)
            self::remove($name);

            return $old_value;
        } else{
            //add it to the session
            self::add($name, $value);
        }

        return null;
    }
}

?>