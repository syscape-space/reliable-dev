<?php

use Illuminate\Support\Facades\Route;
Route::middleware('auth')->group(function (){
    Route::resource('orders','OrderController');
    Route::post('order-access/{order_id}','OrderController@orderAccess')->name('orders.orderAccess');
    Route::resource('tickets','TicketsController');
});

Route::get('ajax/third-departments','AjaxController@third_departments')->name('ajax.third-departments');
