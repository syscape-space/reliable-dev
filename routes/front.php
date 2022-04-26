<?php

use Illuminate\Support\Facades\Route;

Route::resource('orders','OrderController');
Route::get('ajax/third-departments','AjaxController@third_departments')->name('ajax.third-departments');