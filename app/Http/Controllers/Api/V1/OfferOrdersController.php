<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Admin\Orders;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderOffer;

class OfferOrdersController extends Controller
{
    public function getAllOffersOfThisOrder ( $order_id ){
        $allOffers = OrderOffer::join('users', 'order_offers.vendor_id', '=', 'users.id')
                ->join('countries' , 'countries.id' , '=' , 'country_id')
                ->where('order_offers.order_id' , '=' , $order_id)
                ->get(['users.*', 'order_offers.*' , 'countries.country_name_en']);

        $countOffersForThisOrder = OrderOffer::where('order_id' , '=' , $order_id)->count();

        return response()->json([
            "allOffers" => $allOffers , 
            "offersCount" => $countOffersForThisOrder
        ] , 200) ;
    }

    public function acceptOffer($id){
        OrderOffer::where('id', $id)->update(['offer_status' => 'approved']);

        return response()->json([
            "message" => "updated"
        ] , 200) ;
    }

    // getting all data of order and offer owner and order owner
    public function getOrderAndOfferOwnersData( $offer_id ){
        $allOffersAndOrdersOwners = OrderOffer::join('orders', 'orders.id', '=', 'order_offers.order_id')
                ->join('departments' , 'departments.id' , '=' , 'orders.department_id')
                ->join('users' , 'order_offers.vendor_id' , '=' , 'users.id')
                ->where('order_offers.id' , '=' , $offer_id)
                ->get(['users.*', 'order_offers.*' , 'orders.*' , 'departments.department_name_ar']);

        $countOffersForThisOrder = OrderOffer::join('orders', 'orders.id', '=', 'order_offers.order_id' )
                ->where('order_offers.id' , '=' , $offer_id)
                ->count();

        return response()->json([
            "allOffersAndOrdersOwners" => $allOffersAndOrdersOwners ,
            "offersCount" => $countOffersForThisOrder
        ] , 200) ;
    }
}
