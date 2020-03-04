<?php

namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Role;
use App\Classes\Session;

use App\Controllers\BaseController;
use App\Models\Order;
use Exception;

class OrderController extends BaseController{

    public $table_name = 'orders';
  
   


    public function __construct()
    {
        if(!Role::middleware('admin')){
            Redirect::to('/login');
        }
        

       
   
        
    }
    

    public function showOrders(){
    
        $total = Order::all()->count();
        list($orders, $links) = paginate(10, $total, $this->table_name, new Order);
        
        return view('admin/products/orders', compact('orders', 'links'));
    }


}



















?>