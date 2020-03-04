<?php

namespace App\Classes;

class UploadFile{

    protected $filename;
    protected $max_filesize = 2097152;
    protected $extension;
    protected $path;


    //get the filename
    public function getName(){


        return $this->filename;
    }

    protected function setName($file, $name = ''){
        if($name === ''){
            //to get info about the filename relating to its path
            $name = pathinfo($file, PATHINFO_FILENAME);
            //strtolower is to make the name lowercase and str replace below helps to replace '_' and ' ' with '-' and this should occur in the $name variable
            $name = strtolower(str_replace(['_',' '], '-', $name));
            //md5 with microtime just attaches random values to the $name
            $hash = md5(microtime());
            $ext = $this->fileExtension($file);
            $this->filename = "{$name}-{$hash}.{$ext}";
        }
    }

    protected function fileExtension($file){
        //to get info about file extension relating its path
       return $this->extension = pathinfo($file, PATHINFO_EXTENSION);

    }
    
    public static function fileSize($file){
        //new static had to added because $this can't be used in the public static function as it is protected
        $fileobj = new static;

        return $file > $fileobj->max_filesize ? true:false;
    }

    public static function isImage($file){

        $fileobj = new static;
        $ext = $fileobj->fileExtension($file);
        $validExt = array('jpg'. 'jpeg','png', 'bmp', 'gif');

        //this !in_array function means if the $ext is not present in the $validExt
        if(!in_array(strtolower($ext), $validExt)){
            return false;
        }

        return true;
    }
    //get the path where the file was uploaded to
    public function path(){
        return $this->path;
    }

    public static function move($temp_path,$folder,$file,$new_filename=''){

        $fileobj = new static;

        //$ds is just like have "/" when getting a directory i.e public/index.php
        $ds = DIRECTORY_SEPARATOR;

        $fileobj->setName($file, $new_filename);
        $file_name = $fileobj->getName();

        //$folder is not the directory
        if(!is_dir($folder)){
            mkdir($folder, 0777, true);
        }

        $fileobj->path = "{$folder}{$ds}{$file_name}";

        $absolute_path= BASE_PATH."{$ds}public{$ds}$fileobj->path";

        //move_uploaded_file is an inbuilt php function to move uploaded file to a new location
        if(move_uploaded_file($temp_path,$absolute_path)){
            return $fileobj;
            //$fileobj was returned to facilitate method chaining
        }
      
        return null;
    }

}


?>