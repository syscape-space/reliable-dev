<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\CareerRequestDataTable;
use App\Models\CareerRequest;
use Illuminate\Http\Request;


class CareerRequestController extends Controller
{

    public function __construct() {
		// $this->middleware('AdminRole:careerrequests_show', [
		// 	'only' => ['index', 'show'],
		// ]);
		// $this->middleware('AdminRole:careerrequests_add', [
		// 	'only' => ['create', 'store'],
		// ]);
		// $this->middleware('AdminRole:careerrequests_edit', [
		// 	'only' => ['edit', 'update'],
		// ]);
		// $this->middleware('AdminRole:careerrequests_delete', [
		// 	'only' => ['destroy', 'multi_delete'],
		// ]);
	}

    public function index(CareerRequestDataTable $carrerRequest)
    {
        return $carrerRequest->render('admin.careerrequests.index',['title'=>trans('admin.careerrequests')]);
    }

    public function show($id)
    {
        $careerRequest = CareerRequest::find($id);
        return is_null($careerRequest) || empty($careerRequest) ?
        backWithError(trans("admin.undefinedRecord"), aurl("careerrequests")) :
        view('admin.careers.show',[
            'title' => trans('admin.show'),
            'careerRequest' => $careerRequest
        ]);
    }

    public function destroy($id)
    {
        $careerRequest = CareerRequest::find($id);
		if(is_null($careerRequest) || empty($careerRequest)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("careerrequests"));
		}

		$careerRequest->delete();
		return redirectWithSuccess(aurl("careers"), trans('admin.deleted'));
    }

    public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$careerRequest = CareerRequest::find($id);

				if(is_null($careerRequest) || empty($careerRequest)){
					return backWithError(trans('admin.undefinedRecord'), aurl("careers"));
				}
                
				$careerRequest->delete();
			}
			return redirectWithSuccess(aurl("careerrequests"),trans('admin.deleted'));
		}else {
			$careerRequest = CareerRequest::find($data);
			if(is_null($careerRequest) || empty($careerRequest)){
				return backWithError(trans('admin.undefinedRecord'),aurl("careerrequests"));
			}

			$careerRequest->delete();
			return redirectWithSuccess(aurl("careerrequests"),trans('admin.deleted'));
		}
	}
}
