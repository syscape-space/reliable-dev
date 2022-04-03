<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDocumentController extends Controller
{
    public function changeDocumentStatus($table){
        DB::table($table)
            ->where('id','=',\request('id'))
            ->update([
                'status'=>\request('status'),
                'comment'=>\request('comment',''),
            ]);
        return back()->withSuccess('تم التحديث بنجاح');
    }
}
