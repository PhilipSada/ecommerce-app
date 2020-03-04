<?php

namespace App\Classes;

class ErrorHandler{
    //error message to be sent to the admin user
    public function handleErrors($error_number, $error_message, $error_file, $error_line){

        $error = "[{$error_number}] An error occurred in file {$error_file}on line {$error_line}:{$error_message}";


        $environment = getenv("APP_ENV");

        if($environment === 'local'){
            $whoops = new \Whoops\Run;
            $whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
        }else{
            $data= [
                'to'=> getenv('ADMIN_EMAIL'),
                'subject'=>'system error',
                'view'=>'errors',
                'name'=>'Admin',
                'body'=>'email template'
            ];
            
            //method chaining cause we want both functions to run here
            ErrorHandler::emailAdmin($data)->outputFriendlyError();
        }
    }

    //error message to shown to users on the production website
    public function outputFriendlyError(){
        //ob_end_clean() was used so display no other html is displayed on the page
        ob_end_clean();
        view('errors/generic');
        exit;
    }

    //static was used to aid the method chaining on line 27
    public static function emailAdmin($data){

        $mail = new Mail;
        $mail->send($data);
        return new static;
    }
}


?>