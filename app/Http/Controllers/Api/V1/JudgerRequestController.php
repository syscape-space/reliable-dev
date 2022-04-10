<?php

namespace App\Http\Controllers\Api\V1;

use Ahmedjoda\JodaResources\JodaApiResource;
use App\Http\Controllers\Controller;
use App\Models\JudgerRequest;
use Illuminate\Http\Request;

class JudgerRequestController extends Controller
{
    use JodaApiResource;
    protected $model = JudgerRequest::class;
    protected $rules = [
        'name'  =>  'required',
        'city'  =>  'required',
        'contact'  =>  'required',
        'order_id'  =>  'required',
    ];
}
