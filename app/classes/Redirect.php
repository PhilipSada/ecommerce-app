<?php

namespace App\Classes;

class Redirect{
    //to redirect to a specific page
    public static function to($page){

        header("location:$page");
    }

    //to redirect to same page
    public static function back(){
        $uri = $_SERVER['REQUEST_URI'];
        header("location:$uri");
    }
}

?>