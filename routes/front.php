<?php

use Illuminate\Support\Facades\Route;
Route::redirect('/',url('/orders'));
Route::middleware('auth')->group(function (){
    Route::resource('orders','OrderController');
});

Route::get('ajax/third-departments','AjaxController@third_departments')->name('ajax.third-departments');
