<?php

namespace App\Classes;

class Role{

    public static function middleware($role){

        $message = '';

        switch($role){

            case "admin":
                $message = "You are not authorized to view the admin panel";
            break;

            case "user":
                $message = "You are not authorized to view this page";
            break;
        }

        if(isAuthenticated()){
            if(user()->role != $role){
                Session::add('error', $message);
                return false;
            }
        }else{
            Session::add('error', $message);
            return false;

        }

        //return true shows that the user is authenticated and user()->role == $role
        return true;
    }


}

?>