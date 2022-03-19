<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorContrller1 extends Controller
{
    
}


// $users = [];
		// if (request()->ajax()) {
		// 	if (request('get_by') == 'city' && request('city_id') > 0) {
		// 		$users = User::where('city_id', request('city_id'))
		// 			->whereIn('id', users_SD(request('department_id')))
		// 			->where('membership_type', '!=', 'user')
		// 			->where('account_status', 'active')	->get(['name  AS text', 'id']);
		// 	} elseif (request('get_by') == 'filter' && !empty(request('search_user'))) {
		// 		$users = User::where(function ($q) {
		// 				$q->where('name', 'LIKE', '%'.request('search_user').'%')
		// 				->orWhere('email', 'LIKE', '%'.request('search_user').'%')
		// 					->orWhere('mobile', 'LIKE', '%'.request('search_user').'%')
		// 				->orWhere('id_number', 'LIKE', '%'.request('search_user').'%');
		// 			})
		// 			->whereIn('id', users_SD(request('department_id')))
		// 			->where('membership_type', '!=', 'user')
		// 			->where('account_status', 'active')
		// 			->get(['name  AS text', 'id']);
		// 	}
		// }
		// return response(['items' => $users], 200);