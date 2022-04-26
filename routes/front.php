<?php

use Illuminate\Support\Facades\Route;
Route::redirect('/',url('/orders'));
Route::middleware('auth')->group(function (){
    Route::resource('orders','OrderController');
    Route::post('order-access/{order_id}','OrderController@orderAccess')->name('orders.orderAccess');
});

Route::get('ajax/third-departments','AjaxController@third_departments')->name('ajax.third-departments');
