<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\CountriesDataTable;
use Carbon\Carbon;
use App\Models\Country;

use App\Http\Controllers\Validations\CountriesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Countries extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:countries_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:countries_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:countries_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:countries_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(CountriesDataTable $countries)
            {
               return $countries->render('admin.countries.index',['title'=>trans('admin.countries')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.countries.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(CountriesRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['country_flag'] = "";
$data['admin_id'] = admin()->id(); 
		  		$countries = Country::create($data); 
               if(request()->hasFile('country_flag')){
              $countries->country_flag = it()->upload('country_flag','countries/'.$countries->id);
              $countries->save();
              }

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $countries,
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
        		$countries =  Country::find($id);
        		return is_null($countries) || empty($countries)?
        		backWithError(trans("admin.undefinedRecord"),aurl("countries")) :
        		view('admin.countries.show',[
				    'title'=>trans('admin.show'),
					'countries'=>$countries
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$countries =  Country::find($id);
        		return is_null($countries) || empty($countries)?
        		backWithError(trans("admin.undefinedRecord"),aurl("countries")) :
        		view('admin.countries.edit',[
				  'title'=>trans('admin.edit'),
				  'countries'=>$countries
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
				foreach (array_keys((new CountriesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(CountriesRequest $request,$id)
            {
              // Check Record Exists
              $countries =  Country::find($id);
              if(is_null($countries) || empty($countries)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("countries"));
              }
              $data = $this->updateFillableColumns(); 
              $data['admin_id'] = admin()->id(); 
               if(request()->hasFile('country_flag')){
              it()->delete($countries->country_flag);
              $data['country_flag'] = it()->upload('country_flag','countries');
               } 
              Country::where('id',$id)->update($data);

              $countries = Country::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $countries,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$countries = Country::find($id);
		if(is_null($countries) || empty($countries)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("countries"));
		}
               		if(!empty($countries->country_flag)){
			it()->delete($countries->country_flag);		}

		it()->delete('country',$id);
		$countries->delete();
		return redirectWithSuccess(aurl("countries"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$countries = Country::find($id);
				if(is_null($countries) || empty($countries)){
					return backWithError(trans('admin.undefinedRecord'),aurl("countries"));
				}
                    					if(!empty($countries->country_flag)){
				  it()->delete($countries->country_flag);
				}
				it()->delete('country',$id);
				$countries->delete();
			}
			return redirectWithSuccess(aurl("countries"),trans('admin.deleted'));
		}else {
			$countries = Country::find($data);
			if(is_null($countries) || empty($countries)){
				return backWithError(trans('admin.undefinedRecord'),aurl("countries"));
			}
                    
			if(!empty($countries->country_flag)){
			 it()->delete($countries->country_flag);
			}			it()->delete('country',$data);
			$countries->delete();
			return redirectWithSuccess(aurl("countries"),trans('admin.deleted'));
		}
	}
            

}