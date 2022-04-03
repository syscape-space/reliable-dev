<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    public function openOrder($order_id){
        Order::query()->find($order_id)->update(['order_status'=>'under_review']);
        User::query()->find(auth('api')->id())
            ->decrement('current_balance',setting()->minimum_amount_add_order);
        return response(['message'=>'done','status'=>true]);
    }
}
