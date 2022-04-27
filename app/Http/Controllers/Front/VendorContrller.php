<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VendorContrller extends Controller
{
    public function profile($id)
    {
        $user = User::find($id);
        return view('front.vendor.profile', compact('user'));
    }
}


