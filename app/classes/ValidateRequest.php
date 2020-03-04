<?php

namespace App\Classes;
use Illuminate\Database\Capsule\Manager as Capsule;

class ValidateRequest{

    private static $error = [];
    private static $error_messages =[
        //:attribute was used to dynamic fill in the name we want to use 
        'string'=> 'The :attribute field cannot contain numbers',
        'required'=>'The :attribute field is required',
        'minLength'=>'The :attribute field must be a minimum of :policy characters',
        'maxLength'=>'The :attribute field must be a maximum of :policy characters',
        'mixed'=>'The :attribute field can contain letters, numbers, dash and space only',
        'number'=>'The :attribute field cannot contain letters e.g 20.0, 20',
        'email'=>'Email address is not valid',
        'unique'=>'The :attribute field is already taken, please try another one'
    ];

//this function combines all classes in one class 'abide' so we use just this class in other php files
//$dataandvalues would represent the user's input in a form...that is what the user types in the form
    public function abide(array $dataAndValues, array $policies){
        
        foreach($dataAndValues as $column=>$value){
            //to check whether keys gotten from $column are part of the keys specified in $policies that need validation
            if(in_array($column, array_keys($policies))){
                self::doValidation([
                    'column'=> $column,
                    'value'=>$value,
                    //since we are checking if $column is a key in $policies so we do $policies[$column] to target the specific policy which is an array
                    //refer to $rule in productcategorycontroller.php for more clarity, 'name' was a key present in $dataandvalues($_POST) and $policies($rule) and $rule['name'] is the same as $policies[$column]
                    'policies'=>$policies[$column]
                ]);
            }
        }

    }

    private static function doValidation(array $data){
         $column = $data['column'];

         foreach ($data['policies'] as $rule => $policy){
             //self::class refers to the ValidateRequest class
             //$rule refers to the class names i.e unique, minlength etc
             //the $valid is basically putting all the defined protected static function such as unique, minlength etc in an array
             $valid = call_user_func_array([self::class, $rule], [$column, $data['value'], $policy]);
             if(!$valid){
                 self::setError(
                     //we can do $error_messages[$rule] because $rule is defined in this static function and 
                     //it's equivalent to the names specified in the $error_messages function defined above i.e'string'=>'.....'
                     //$column at the end of this str_replace method refers to the key which was defined in the $seterror function (i.e $key=null)
                    str_replace([':attribute', ':policy','_'],[$column, $policy, ' '],self::$error_messages[$rule]), $column
                 );
             }
             
             
         }
    }

    protected static function unique($column, $value, $policy){
        //$column is the field name  $value is the value passed into the form  $policy is the rule we set
        
        if($value != null && !empty(trim($value))){
            //to avoid returning a value that already exists in the database
            return !Capsule::table($policy)->where($column, '=', $value)->exists();
        }
        //then this means the values are unique
        return true;
    }

    protected static function required($column, $value, $policy){
         //this ensures you type in a value(category name) to be created
        return $value != null && !empty(trim($value));
    }

    protected static function minLength($column, $value, $policy){
        
        if($value != null && !empty(trim($value))){
            
            return strlen($value) >= $policy;
        }
        
        return true;
    }
    protected static function maxLength($column, $value, $policy){
        
        if($value != null && !empty(trim($value))){
            
            return strlen($value) <= $policy;
        }
        
        return true;
    }

    //to check if the value is a valid email address
    protected static function email($column, $value, $policy){
        
        if($value != null && !empty(trim($value))){
            
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        }
        
        return true;
    }
    //to check if the value has allowed characters
    protected static function mixed($column, $value, $policy){
        
        if($value != null && !empty(trim($value))){
            //if the value does not have the allowed characters
            if(!preg_match('/^[A-Za-z0-9 .,_~\-!@#\&%\^\'\*\(\)]+$/',$value)){
                return false;
            }
        }
        
        return true;
    }
    //allowed characters for strings
    protected static function string($column, $value, $policy){
        
        if($value != null && !empty(trim($value))){
            //if the value does not have the allowed characters(space allowed)
            if(!preg_match('/^[A-Za-z ]+$/',$value)){
                return false;
            }
        }
        
        return true;
    }
    //allowed characters for numbers
    protected static function number($column, $value, $policy){
        
        if($value != null && !empty(trim($value))){
            //if the value does not have the allowed characters (no space allowed)
            if(!preg_match('/^[0-9.]+$/',$value)){
                return false;
            }
        }
        
        return true;
    }

    //to set specific error or to add the error messages to the empty error array created above ($error=[])
    private static function setError($error, $key=null){
        //if $key is defined 
        if($key){
            //we then save the error message in the private static $error=[] defined above as one column could have about 3 validation rules
            self::$error[$key][]=$error;
        }else{
            self::$error[]=$error;
        }
    }
    //return true if there is validation error
    public function hasError(){

        return count(self::$error) > 0 ? true : false;
    }

    //return all validation errors
    public function getErrorMessages(){
        return self::$error;
    }

}

?>