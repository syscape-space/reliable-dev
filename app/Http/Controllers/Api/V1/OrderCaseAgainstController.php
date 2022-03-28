<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\OrderCaseAgainst;
use Illuminate\Http\Request;

class OrderCaseAgainstController extends Controller
{
    // getting بيانات المدعى عليه
    public function getDataOfDefendant($id){
        $defendant = OrderCaseAgainst::where('order_id' , '=' , $id)
                ->get(['order_case_againsts.*']);

        return response()->json([
            "defendant" => $defendant 
        ] , 200) ;
    }
}
