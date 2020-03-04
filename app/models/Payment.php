<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Payment extends Model{

    use SoftDeletes; //eloquent uses this to ignore deleted items in the database

    public $timestamps = true; 
    protected $fillable = ['user_id', 'amount','order_no','status']; 
    protected $dates = ['deleted_at'];


    public function transform($data){
        $payments = [];
        foreach ($data as $item){
            
            $added = new Carbon($item->created_at);
            array_push($payments, [
                'id'=>$item->id,
                'user_id'=>$item->user_id,
                'amount'=>$item->amount,
                'status'=>$item->status,
                'order_no'=>$item->order_no,
                'added'=>$added->toFormattedDateString()
            ]);
        }

        return $payments;
    }

}
?>