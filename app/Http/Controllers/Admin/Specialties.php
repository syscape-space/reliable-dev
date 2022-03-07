<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SpecialtiesDataTable;
use Carbon\Carbon;
use App\Models\Specialtie;

use App\Http\Controllers\Validations\SpecialtiesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class Specialties extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:specialties_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:specialties_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:specialties_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:specialties_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SpecialtiesDataTable $specialties)
            {
               return $specialties->render('admin.specialties.index',['title'=>trans('admin.specialties')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.specialties.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(SpecialtiesRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['admin_id'] = admin()->id(); 
		  		$specialties = Specialtie::create($data); 

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $specialties,
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
        		$specialties =  Specialtie::find($id);
        		return is_null($specialties) || empty($specialties)?
        		backWithError(trans("admin.undefinedRecord"),aurl("specialties")) :
        		view('admin.specialties.show',[
				    'title'=>trans('admin.show'),
					'specialties'=>$specialties
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$specialties =  Specialtie::find($id);
        		return is_null($specialties) || empty($specialties)?
        		backWithError(trans("admin.undefinedRecord"),aurl("specialties")) :
        		view('admin.specialties.edit',[
				  'title'=>trans('admin.edit'),
				  'specialties'=>$specialties
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
				foreach (array_keys((new SpecialtiesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(SpecialtiesRequest $request,$id)
            {
              // Check Record Exists
              $specialties =  Specialtie::find($id);
              if(is_null($specialties) || empty($specialties)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("specialties"));
              }
              $data = $this->updateFillableColumns(); 
              $data['admin_id'] = admin()->id(); 
              Specialtie::where('id',$id)->update($data);

              $specialties = Specialtie::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $specialties,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$specialties = Specialtie::find($id);
		if(is_null($specialties) || empty($specialties)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("specialties"));
		}
               
		it()->delete('specialtie',$id);
		$specialties->delete();
		return redirectWithSuccess(aurl("specialties"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$specialties = Specialtie::find($id);
				if(is_null($specialties) || empty($specialties)){
					return backWithError(trans('admin.undefinedRecord'),aurl("specialties"));
				}
                    	
				it()->delete('specialtie',$id);
				$specialties->delete();
			}
			return redirectWithSuccess(aurl("specialties"),trans('admin.deleted'));
		}else {
			$specialties = Specialtie::find($data);
			if(is_null($specialties) || empty($specialties)){
				return backWithError(trans('admin.undefinedRecord'),aurl("specialties"));
			}
                    
			it()->delete('specialtie',$data);
			$specialties->delete();
			return redirectWithSuccess(aurl("specialties"),trans('admin.deleted'));
		}
	}
            

}