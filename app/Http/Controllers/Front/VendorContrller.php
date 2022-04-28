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

    public function about($id)
    {
        $user = User::find($id);
        return view('front.vendor.about', compact('user'));
    }

    public function licenses($id)
    {
        $user = User::find($id);
        return view('front.vendor.specialty', compact('user'));
    }

    public function executed_contracts($id)
    {
        $user = User::find($id);
        return view('front.vendor.executed_contracts', compact('user'));
    }

    public function audio_consulting($id)
    {
        $user = User::find($id);
        return view('front.vendor.audio_consulting', compact('user'));
    }

    public function qualifications_and_training($id)
    {
        $user = User::find($id);
        return view('front.vendor.qualifications_and_training', compact('user'));
    }

    public function specialty($id)
    {
        $user = User::find($id);
        return view('front.vendor.specialty', compact('user'));
    }

    public function statistics($id)
    {
        $user = User::find($id);
        return view('front.vendor.statistics', compact('user'));
    }

    public function posts($id)
    {
        $user = User::find($id);
        return view('front.vendor.posts', compact('user'));
    }
}


