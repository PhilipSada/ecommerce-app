<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Order extends Model{

    use SoftDeletes; //eloquent uses this to ignore deleted items in the database

    public $timestamps = true; 
    protected $fillable = ['user_id', 'product_id','quantity','unit_price','total', 'status','order_no']; 
    protected $dates = ['deleted_at'];


    public function transform($data){
        $orders = [];
        foreach ($data as $item){
            
            $added = new Carbon($item->created_at);
            array_push($orders, [
                'id'=>$item->id,
                'user_id'=>$item->user_id,
                'product_id'=> $item->product_id,
                'quantity' =>$item->quantity,
                'unit_price'=>$item->unit_price,
                'total'=>$item->total,
                'status'=>$item->status,
                'order_no'=>$item->order_no,
                'added'=>$added->toFormattedDateString()
            ]);
        }

        return $orders;
    }

}
?>