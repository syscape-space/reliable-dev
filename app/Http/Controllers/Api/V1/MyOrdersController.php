<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class MyOrdersController extends Controller
{
    public function getMyOrders($id){
        

        $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                ->join('user_jobs' , 'users.id' , '=' , 'user_jobs.user_id' )
                ->join('specialties' , 'user_jobs.specialtie_id' , '=' , 'specialties.id' )
                ->join('order_types' , 'order_types.id' , '=' , 'orders.order_type_id' )
                ->join('countries' , 'countries.id' , '=' , 'orders.country_id' )
                ->where('orders.user_id' , '=' , $id)
                ->get(['users.*', 'orders.*' ,  'specialties.specialty_name_ar' , 'order_types.*' , 'countries.country_name_ar']);

        return response()->json([
            "orders" => $orders
        ], 200);
    }
}
