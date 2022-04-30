<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\OrderOffer;
use Illuminate\Http\Request;

class OrderOfferController extends Controller
{
    public function store(){
        $data = \request()->except("_token");
        $data['vendor_id'] = auth()->id();
        $data['offer_status'] = "pending";
        OrderOffer::query()->create($data);
        return redirect()->back()->withSuccess('تم اضافة عرضك بنجاح');
    }
}
