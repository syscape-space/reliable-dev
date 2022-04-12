<?php

namespace App\Http\Controllers\Admin;

use Ahmedjoda\JodaResources\JodaResource;
use App\DataTables\JudgerRequestDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JudgerRequestController extends Controller
{
    use JodaResource;
    protected $rules=[
        'status'    =>  'required',
        'note'    =>  'nullable',
    ];
    public function index()
    {
        $table = new JudgerRequestDataTable();
        return $table->render('admin.judger_request.index');
    }
}
