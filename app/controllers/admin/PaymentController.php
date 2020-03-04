<?php

namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Role;
use App\Classes\Session;

use App\Controllers\BaseController;
use App\Models\Order;
use App\Models\Payment;
use Exception;

class PaymentController extends BaseController{

    public $table_name = 'payments';

   


    public function __construct()
    {
        if(!Role::middleware('admin')){
            Redirect::to('/login');
        }

       
   
        
    }
    

    public function showPayments(){
    
        $total = Payment::all()->count();
        list($payments, $links) = paginate(10, $total, $this->table_name, new Payment);
        
        return view('admin/products/payments', compact('payments', 'links'));
    }


}



















?>