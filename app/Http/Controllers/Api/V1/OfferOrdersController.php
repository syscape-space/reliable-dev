<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
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
}
