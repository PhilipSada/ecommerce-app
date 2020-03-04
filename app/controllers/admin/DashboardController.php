<?php


namespace App\Controllers\Admin;

use App\Classes\Redirect;
use App\Classes\Session;
use App\Controllers\BaseController;
use App\Classes\Request;
use App\Classes\Role;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;

class DashboardController extends BaseController{

    public function __construct()
    {   
        //if the role class is returning a false
        if(!Role::middleware('admin')){
            Redirect::to('/login');
        }
    }


    public function show(){

       $orders = Capsule::table('orders')->count(Capsule::raw('DISTINCT order_no'));//to get the distinct order numbers
    //    $orders = Order::all()->count();
       $products = Product::all()->count();
       $users = User::all()->count();
       $payments = Payment::all()->sum('amount')/100; //the amounts were saved in cents so we have to divide it by 100 to get back the dollar

        return view('admin/dashboard', compact('orders', 'products', 'users', 'payments'));
    }
    public function getChartData(){
      
        $revenue = Capsule::table('payments')->select(
            //using raw sql
            Capsule::raw('sum(amount)/100 as `amount`'),
            Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
            Capsule::raw('YEAR(created_at) year, MONTH(created_at) month')
        )->groupBy('year', 'month')->get();

        $orders = Capsule::table('orders')->select(
            //using raw sql
            Capsule::raw('count(id) as `count`'),
            Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
            Capsule::raw('YEAR(created_at) year, MONTH(created_at) month')
        )->groupBy('year', 'month')->get();

        echo json_encode(['revenues'=>$revenue, 'orders'=>$orders]);
        exit;
    }
       
}

?>