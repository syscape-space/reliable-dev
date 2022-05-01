<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Negotiate;
use Illuminate\Http\Request;

class NegotiationController extends Controller
{
    public function show($id){
        $active_negotiation = Negotiate::query()->find($id);
        $order = $active_negotiation->order;
        return view('front.orders.negotiation',compact('active_negotiation','order'));
    }
}
