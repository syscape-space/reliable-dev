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
        $users = DB::table('users')
            ->where('id' , '=' , $id)
            ->get();

            return response()->json([
                "userData" => $users , 
            ]) ;
    }


}
