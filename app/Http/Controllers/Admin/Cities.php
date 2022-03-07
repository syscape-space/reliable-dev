<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\CitiesDataTable;
use Carbon\Carbon;
use App\Models\City;

use App\Http\Controllers\Validations\CitiesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Cities extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:cities_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:cities_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:cities_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:cities_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(CitiesDataTable $cities)
            {
               return $cities->render('admin.cities.index',['title'=>trans('admin.cities')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.cities.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(CitiesRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['admin_id'] = admin()->id(); 
		  		$cities = City::create($data); 

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $cities,
			]);
			 }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.37]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$cities =  City::find($id);
        		return is_null($cities) || empty($cities)?
        		backWithError(trans("admin.undefinedRecord"),aurl("cities")) :
        		view('admin.cities.show',[
				    'title'=>trans('admin.show'),
					'cities'=>$cities
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$cities =  City::find($id);
        		return is_null($cities) || empty($cities)?
        		backWithError(trans("admin.undefinedRecord"),aurl("cities")) :
        		view('admin.cities.edit',[
				  'title'=>trans('admin.edit'),
				  'cities'=>$cities
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new CitiesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(CitiesRequest $request,$id)
            {
              // Check Record Exists
              $cities =  City::find($id);
              if(is_null($cities) || empty($cities)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("cities"));
              }
              $data = $this->updateFillableColumns(); 
              $data['admin_id'] = admin()->id(); 
              City::where('id',$id)->update($data);

              $cities = City::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $cities,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$cities = City::find($id);
		if(is_null($cities) || empty($cities)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("cities"));
		}
               
		it()->delete('city',$id);
		$cities->delete();
		return redirectWithSuccess(aurl("cities"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$cities = City::find($id);
				if(is_null($cities) || empty($cities)){
					return backWithError(trans('admin.undefinedRecord'),aurl("cities"));
				}
                    	
				it()->delete('city',$id);
				$cities->delete();
			}
			return redirectWithSuccess(aurl("cities"),trans('admin.deleted'));
		}else {
			$cities = City::find($data);
			if(is_null($cities) || empty($cities)){
				return backWithError(trans('admin.undefinedRecord'),aurl("cities"));
			}
                    
			it()->delete('city',$data);
			$cities->delete();
			return redirectWithSuccess(aurl("cities"),trans('admin.deleted'));
		}
	}
            

}