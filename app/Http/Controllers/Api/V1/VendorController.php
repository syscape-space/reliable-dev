<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function getProfile(Request $request)
    {
        return response()->json("data" , "hello") ;
    }
}
