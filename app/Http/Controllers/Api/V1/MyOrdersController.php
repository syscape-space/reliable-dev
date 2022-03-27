<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyOrdersController extends Controller
{
    public function gettingFilteredOrders($stutus){
        $filteredOrders = Order::join('users', 'users.id', '=', 'orders.user_id')
                ->where('orders.order_status' , '=' , $stutus)
                ->get(['users.*', 'orders.*']);

        // $relevantTickets = Ticket::where('user_id', '=', $id)->get();
        // $ticketsCount = $relevantTickets->count();

        return response()->json([
            "filteredOrders" => $filteredOrders 
        ] , 200) ;
    }


}
