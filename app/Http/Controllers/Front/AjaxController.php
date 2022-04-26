<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Models\Order;

class AjaxController extends Controller
{

    
    public function third_departments(Request $r)
    {
        $r->validate([
            'second_department_id' => ['required'],
        ]);
        $title = 'Choose a department';
        $error = 'No results found';
        $options = Department::where('parent', $r->main_department_id)->pluck("department_name_ar","id")->all();
        $data = view('front.ajax_views.select',compact(['options', 'title', 'error']))->render();
        return response()->json(['options'=>$data]);
    }

}
