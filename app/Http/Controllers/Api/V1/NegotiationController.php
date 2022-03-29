<?php

namespace App\Http\Controllers\Api\V1;

use Ahmedjoda\JodaResources\JodaApiResource;
use App\Http\Controllers\Controller;
use App\Models\Negotiate;
use App\Models\User;
use Illuminate\Http\Request;

class NegotiationController extends Controller
{
    use JodaApiResource;
    protected $model = Negotiate::class;
    public function index()
    {
        $negotiations = Negotiate::query()->where(function($q){
            if (\request('order_id'))
                $q->whereOrderId(\request('order_id'));
        })->with('users')->get();
        return $this->jsonForm(compact('negotiations'));
    }
    public function store()
    {
        $user = User::query()->find(auth('api')->id());
        if ($negotiate = $user->negotiations()->where('order_id',\request('order_id'))->get()->first()){
//             TODO
        }else{
            $negotiate = $user->negotiations()->create(\request()->only('order_id'));
        }
        return $this->jsonForm(compact('negotiate'));
    }
    public function query($query){
        return $query->with('messages','order','users','messages.user');
    }
}
