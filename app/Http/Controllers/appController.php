<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class appController extends Controller
{
    public function getName(Request $request){
        return "name" ;
    }
}
