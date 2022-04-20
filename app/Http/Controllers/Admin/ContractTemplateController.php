<?php

namespace App\Http\Controllers\Admin;

use Ahmedjoda\JodaResources\JodaResource;
use App\DataTables\ContractTemplateDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContractTemplateController extends Controller
{
    use JodaResource;
    protected $rules = [
        'content_ar'    =>  'required',
        'content_en'    =>  'required',
        'title_ar'    =>  'required',
        'title_en'    =>  'required',
        'active'    =>  'sometimes',
    ];
    public function index()
    {
        $table = new ContractTemplateDataTable();
        return $table->render('admin.contract-template.index');
    }
}
