<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Product extends Model{

    use SoftDeletes; //eloquent uses this to ignore deleted items in the database

    public $timestamps = true; //this was set to true so that the fields involving timestamps would be automatically populated in the mysql database
    protected $fillable = ['name', 'price', 'description', 'category_id', 'sub_category_id', 'quantity', 'image_path', 'gender', 'size', 'brand', 'featured']; 
    protected $dates = ['deleted_at'];

    //defining the relationship with Category class
    public function category(){
        
        return $this->belongsTo(Category::class);
     }
 
    //defining the relationship with SubCategory class
     public function subCategory(){
 
        return $this->belongsTo(SubCategory::class);
    }

    //transforming the data
    public function transform($data){
        $products = [];
        foreach ($data as $item){
            //Carbon was used to solve the error with the timestamp created_at
            $added = new Carbon($item->created_at);
            //after looping through $data we insert the data in $categories empty array using array_push
            //first() means first record
            array_push($products, [
                'id'=>$item->id,
                'name'=> $item->name,
                'description'=>$item->description,
                'category_id' =>$item->category_id,
                'category_name'=>Category::where('id', $item->category_id)->first()->name,
                'sub_category_name'=>SubCategory::where('id', $item->sub_category_id)->first()->name,
                'sub_category_id'=>$item->sub_category_id,
                'quantity'=>$item->quantity,
                'image_path'=>$item->image_path,
                'price'=>$item->price,
                'gender'=>$item->gender,
                'size'=>$item->size,
                'brand'=>$item->brand,
                'featured'=>$item->featured,
                //the 'toFormattedDateString'function can be used because of we set timestamp to true using eloquent in category.php
                'added'=>$added->toFormattedDateString()
            ]);
        }

        return $products;
    }
}












?>