<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyOrdersController extends Controller
{
    public function getMyOrders($id){
        

        $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
                ->join('user_jobs' , 'users.id' , '=' , 'user_jobs.user_id' )
                ->join('specialties' , 'user_jobs.specialtie_id' , '=' , 'specialties.id' )
                ->join('order_types' , 'order_types.id' , '=' , 'orders.order_type_id' )
                ->join('countries' , 'countries.id' , '=' , 'orders.country_id' )
                ->join('order_offers' , 'order_offers.order_id' , '=' , 'orders.id' )
                ->where('orders.user_id' , '=' , $id)
                ->select('users.*', 'orders.*' ,  'specialties.specialty_name_ar' ,
                'order_types.*' , 'countries.country_name_ar' , DB::raw("count(order_offers.id) as offersCount"))
                ->get();

        return response()->json([
            "orders" => $orders 
        ], 200);
    }


}
