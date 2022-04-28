<?php

use Illuminate\Support\Facades\Route;
Route::middleware('auth:web')->group(function (){
    Route::resource('orders','OrderController')->except(['create']);
    Route::get('order/create/{id?}','OrderController@create')->name('orders.create');
    Route::get('order/{order_id}/select-vendors','OrderController@select_vendors')->name('orders.select-vendors');
    Route::put('order/{order_id}/select-vendors','OrderController@update_selected_vendors')->name('orders.select-vendors.update');


    Route::post('order-access/{order_id}','OrderController@orderAccess')->name('orders.orderAccess');
    Route::resource('tickets','TicketsController');
    Route::get('balance','BalanceController@balance')->name('balance');
    Route::get('profile','ProfileController@profile')->name('profile');
    Route::get('order/{hash_code}/offer/{id}','OrderController@showOffer')->name('order.offers.show');
    Route::get('vendor/{id}/profile','VendorContrller@profile')->name('vendor.profile');

});

Route::get('ajax/third-departments','AjaxController@third_departments')->name('ajax.third-departments');
Route::get('ajax/last-seen','AjaxController@last_seen')->name('ajax.last-seen');


