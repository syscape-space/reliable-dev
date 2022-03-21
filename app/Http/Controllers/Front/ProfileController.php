<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function index(Request $request)
    {
        $user_id = $request->query('id');
        $user = User::find($user_id);
        return view('front.user.profile.mainProfile', ["user" => $user]);
    }

    public function updatePersonalInfo(Request $request)
    {
        $data = $request->all();
        $user = User::find($data['id']);
        $user->update([
            "first_name" => isset($data['first_name']) ? $data['first_name'] : $user->first_name,
            "middle_name" => isset($data['middle_name']) ? $data['middle_name'] : $user->middle_name,
            "last_name" => isset($data['last_name']) ? $data['last_name'] : $user->last_name,
            "name" => isset($data['name']) ? $data['name'] : $user->name,
            "mobile" => isset($data['mobile']) ? $data['mobile'] : $user->mobile,
            "country_id" => isset($data['country_id']) ? $data['country_id'] : $user->country_id,
            "city_id" => isset($data['city_id']) ? $data['city_id'] : $user->city_id,
            "address" => isset($data["address"]) ? $data['address'] : $user->address
        ]);
        $user->save();
        return redirect('/profile?id=' . $user->id);
    }
}
