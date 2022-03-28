<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EditUserProfileController extends Controller
{
    public function updateUseProfileImage ( Request $request , $id){
        $validated = $request->validate([
            'photo_profile' => 'required'
        ]);
        // User::where('id', $id)
        // ->update(['photo_profile' => 1]);
            $imagename = $request->file('photo_profile')->getClientOriginalName();
            $request->image->storeAs('mostafa' , $imagename);
            return "done";
        

    }
}
