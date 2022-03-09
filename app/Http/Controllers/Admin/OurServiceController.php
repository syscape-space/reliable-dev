<?php

namespace App\Http\Controllers\Admin;

use Ahmedjoda\JodaResources\JodaResource;
use App\DataTables\OurServiceDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OurServiceController extends Controller
{
    use JodaResource;
    protected $rules = [
        'title' =>  'required',
        'logo'  =>  'image'
    ];
    protected $files = [
        'logo'
    ];
    public function index(OurServiceDataTable $table)
    {
        return $table->render('admin.our-service.index');
    }
}
