<?php

use Illuminate\Support\Facades\Route;

Route::middleware('app-lang')->group(function (){
    Route::get('/{vue_capture?}', function (){
        return view('app.index');
    })->where('vue_capture', '[\/\w\.\-\ \&\=]*');
});