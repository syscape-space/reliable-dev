<?php

use Illuminate\Support\Facades\Storage;

function cuteAsset($uri){
    $uri ='/'.$uri;
    $uri = str_replace('//','/',$uri);
    // check if file
    if (env('APP_SERVING',false)){
        if (file_exists(__DIR__.'/public'.$uri)) {
            return url($uri);
        }elseif (file_exists(__DIR__.$uri)){
            return url($uri);
        }
    }else{
        if (file_exists(__DIR__.'/public'.$uri)) {
            return asset($uri);
        }elseif (file_exists(__DIR__.$uri)){
            return asset($uri);
        }
    }

    echo "uri:".asset($uri);
    // return uri if not file or not exists
//    return  abort(404);
}