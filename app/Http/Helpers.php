<?php
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

/**
 * @param $numbers
 * @return mixed
 */
function translateNumbers($numbers)
{
    // Don't translate if the locale is English
    if (config('app.locale') === 'en') {
        return $numbers;
    }

    $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];
    $english = ['9', '8', '7', '6', '5', '4', '3', '2', '1', '0'];

    return str_replace($english, $arabic, $numbers);
}

function translateCurrency($currency)
{
    // Don't translate if the locale is English
    if (config('app.locale') === 'en') {
        return $currency;
    }

    $arabic = ['جنيه', 'دولار', 'يورو', 'درهم اماراتي', 'ريال سعودي', 'جنيه استرليني'];
    $english = ['EGP', 'USD', 'EU', 'AED', 'SAR', 'GBP'];

    return str_replace($english, $arabic, $currency);
}



function isActive($name)
{
    ($name == \Route::current()->getName()) ? true : false ;
}


function itemIsActive($name, $action)
{
    $current_route_name = \Route::current()->getName();
    $current_route_array = explode('.', $current_route_name);
    if (in_array($name, $current_route_array) && in_array($action, $current_route_array)) {
        return true;  
    }
    return false;  
}


function active($name)
{
    if (\Route::current()->getName() == $name) {
        return true; 
    }
    return false;  
}

function __e($ar,$en)
{
    return app()->getLocale() == 'ar'?  $ar : $en;
}


function exerpt_text($text, $length)
{
  
    $max_length = $length;

    if (strlen($text) > $max_length)
    {
        $offset = ($max_length - 3) - strlen($text);
        $text = substr($text, 0, strrpos($text, ' ', $offset)) . '...';
    }
    
    return $text;
}



