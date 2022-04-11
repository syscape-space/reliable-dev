<?php

namespace App\Http\Controllers\Api\V1;

use Ahmedjoda\JodaResources\JodaApiResource;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class JudgerController extends Controller
{
    use JodaApiResource;
    protected $model = User::class;
    public function query($query){
        return $query->where('membership_type','judger')->get();
    }
}
