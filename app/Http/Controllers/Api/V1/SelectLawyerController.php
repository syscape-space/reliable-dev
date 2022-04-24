<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SelectLawyerController extends Controller
{

    public function index()
    {
        $users = User::with(['city', 'licenses'])->withCount('orders')->get();
        return response()->json([
            "users" => $users, 
        ] , 200) ;
    }

    public function search(Request $request)
    {
        if($request->keyword == null) {
            $users = User::with(['city', 'licenses'])->withCount('orders')->get();
        } else {
            $users = User::where('name', 'LIKE','%'.$request->keyword.'%')->with(['city', 'licenses'])->withCount('orders')->get();

        }
        return response()->json($users); 
    }

}
