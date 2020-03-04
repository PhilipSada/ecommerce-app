<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Category extends Model{

    use SoftDeletes; //eloquent uses this to ignore deleted items in the database

    public $timestamps = true; //this was set to true so that the fields involving timestamps would be automatically populated in the mysql database
    protected $fillable = ['name', 'slug']; //this is for mass inserting into the specified columns ('name and slug') $fillable is a reserved eloquent variable
    protected $dates = ['deleted_at'];


    //defining the relationship with Product class (the public functions were named in plural form to denote that it has many relationships)
    public function products(){
        return $this->hasMany(Product::class);
    }

    //defining the relationship with SubCategory class
    public function subCategories(){
        return $this->hasMany(SubCategory::class);
    }

    //transforming the data
    public function transform($data){
        $categories = [];
        foreach ($data as $item){
            //Carbon was used to solve the error with the timestamp created_at
            $added = new Carbon($item->created_at);
            //after looping through $data we insert the data in $categories empty array using array_push
            array_push($categories, [
                'id'=>$item->id,
                'name'=> $item->name,
                'slug' =>$item->slug,
                //the 'toFormattedDateString'function can be used because of we set timestamp to true using eloquent in category.php
                'added'=>$added->toFormattedDateString()
            ]);
        }

        return $categories;
    }
}












?>