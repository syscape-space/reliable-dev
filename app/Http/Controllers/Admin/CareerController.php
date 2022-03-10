<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\CareerDataTable;
use App\Models\Career;
use Illuminate\Http\Request;


class CareerController extends Controller
{

    public function __construct() {
		// $this->middleware('AdminRole:support_messages_show', [
		// 	'only' => ['index', 'show'],
		// ]);
		// $this->middleware('AdminRole:support_messages_add', [
		// 	'only' => ['create', 'store'],
		// ]);
		// $this->middleware('AdminRole:support_messages_edit', [
		// 	'only' => ['edit', 'update'],
		// ]);
		// $this->middleware('AdminRole:support_messages_delete', [
		// 	'only' => ['destroy', 'multi_delete'],
		// ]);
	}

    public function index(CareerDataTable $carrer)
    {
        return $carrer->render('admin.careers.index',['title'=>trans('admin.careers')]);
    }

    public function create()
    {
        $data = [
            'title'=>trans('admin.create')
        ];
        return view('admin.careers.create', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'address' => 'required|min:3|max:255|string',
            'qualification' => 'required|max:255',
            'experience' => 'required',
            'description' => 'required',
            'start_at' => 'required|date|after_or_equal:today',
            'end_at' => 'required|date|after:today'
        ]);

        $career = Career::create($data);

        return successResponseJson([
            "message" => trans("admin.added"),
            "data" => $career,
        ]);
    }

    public function show($id)
    {
        $career = Career::find($id);
        return is_null($career) || empty($career) ?
        backWithError(trans("admin.undefinedRecord"), aurl("careers")) :
        view('admin.careers.show',[
            'title' => trans('admin.show'),
            'career' => $career
        ]);
    }

    public function edit($id)
    {
        $career = Career::find($id);
        return is_null($career) || empty($career)?
        backWithError(trans("admin.undefinedRecord"), aurl("careers")) :
        view('admin.careers.edit',[
            'title' => trans('admin.edit'),
            'career' => $career
        ]);
    }

    public function update(Request $request, $id)
    {
        $career = Career::find($id);
        $data = $request->validate([
            'address' => 'required|min:3|max:255|string',
            'qualification' => 'required|max:255',
            'experience' => 'required',
            'description' => 'required',
            'start_at' => 'required|date|after_or_equal:today',
            'end_at' => 'required|date|after:today'
        ]);
        
        if(is_null($career) || empty($career)){
            return backWithError(trans("admin.undefinedRecord"), aurl("careers"));
        }

        Career::where('id', $id)->update($data);
        $career = Career::find($id);

        return successResponseJson([
            "message" => trans("admin.updated"),
            "data" => $career,
        ]);
    }

    public function destroy($id)
    {
        $career = Career::find($id);
		if(is_null($career) || empty($career)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("careers"));
		}
		it()->delete('career', $id);
		$career->delete();
		return redirectWithSuccess(aurl("careers"), trans('admin.deleted'));
    }

    public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$career = Career::find($id);

				if(is_null($career) || empty($career)){
					return backWithError(trans('admin.undefinedRecord'), aurl("careers"));
				}
                    	
				it()->delete('career', $id);
				$career->delete();
			}
			return redirectWithSuccess(aurl("careers"),trans('admin.deleted'));
		}else {
			$career = Career::find($data);
			if(is_null($career) || empty($career)){
				return backWithError(trans('admin.undefinedRecord'),aurl("careers"));
			}
                    
			it()->delete('career', $data);
			$career->delete();
			return redirectWithSuccess(aurl("careers"),trans('admin.deleted'));
		}
	}
}
