<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\OurService;
use Illuminate\Http\Request;

class OurServiceController extends Controller
{
    public function index(){
        return response(['status'=>true,'data'=>OurService::all()] );
    }
}
