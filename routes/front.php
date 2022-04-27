<?php

use Illuminate\Support\Facades\Route;
Route::middleware('auth:web')->group(function (){
    Route::resource('orders','OrderController');
    Route::post('order-access/{order_id}','OrderController@orderAccess')->name('orders.orderAccess');
    Route::resource('tickets','TicketsController');
    Route::get('profile','ProfileController@profile');

});

Route::get('ajax/third-departments','AjaxController@third_departments')->name('ajax.third-departments');

// Route::get('test-login', function () {
// 	$user = \App\Models\User::first();
//     \Auth::login($user);
//     dd(auth()->check());
// });