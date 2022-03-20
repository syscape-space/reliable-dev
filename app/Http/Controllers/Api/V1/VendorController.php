<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{

    public function arrWith(){
        return ['user_job',];
    }

    public function vendorProfile($id){

         $users = User::join('countries', 'users.country_id', '=', 'countries.id')
                ->join('cities' , 'countries.id' , '=' , 'cities.country_id')
                ->where('users.id' , '=' , $id)
                ->get(['users.*', 'countries.country_name_ar' , 'cities.city_name_ar']);

            return response()->json([
                "userData" => $users , 
            ] , 200) ;
    }


}
