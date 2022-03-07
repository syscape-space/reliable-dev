<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\PackageRequestsDataTable;
use Carbon\Carbon;
use App\Models\PackageRequest;

use App\Http\Controllers\Validations\PackageRequestsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class PackageRequests extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:packagerequests_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:packagerequests_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:packagerequests_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:packagerequests_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.37]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(PackageRequestsDataTable $packagerequests)
            {
               return $packagerequests->render('admin.packagerequests.index',['title'=>trans('admin.packagerequests')]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.packagerequests.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.37]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(PackageRequestsRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$packagerequests = PackageRequest::create($data); 

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $packagerequests,
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
        		$packagerequests =  PackageRequest::find($id);
        		return is_null($packagerequests) || empty($packagerequests)?
        		backWithError(trans("admin.undefinedRecord"),aurl("packagerequests")) :
        		view('admin.packagerequests.show',[
				    'title'=>trans('admin.show'),
					'packagerequests'=>$packagerequests
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.37]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$packagerequests =  PackageRequest::find($id);
        		return is_null($packagerequests) || empty($packagerequests)?
        		backWithError(trans("admin.undefinedRecord"),aurl("packagerequests")) :
        		view('admin.packagerequests.edit',[
				  'title'=>trans('admin.edit'),
				  'packagerequests'=>$packagerequests
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
				foreach (array_keys((new PackageRequestsRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(PackageRequestsRequest $request,$id)
            {
              // Check Record Exists
              $packagerequests =  PackageRequest::find($id);
              if(is_null($packagerequests) || empty($packagerequests)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("packagerequests"));
              }
              $data = $this->updateFillableColumns(); 
              PackageRequest::where('id',$id)->update($data);

              $packagerequests = PackageRequest::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $packagerequests,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$packagerequests = PackageRequest::find($id);
		if(is_null($packagerequests) || empty($packagerequests)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("packagerequests"));
		}
               
		it()->delete('packagerequest',$id);
		$packagerequests->delete();
		return redirectWithSuccess(aurl("packagerequests"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$packagerequests = PackageRequest::find($id);
				if(is_null($packagerequests) || empty($packagerequests)){
					return backWithError(trans('admin.undefinedRecord'),aurl("packagerequests"));
				}
                    	
				it()->delete('packagerequest',$id);
				$packagerequests->delete();
			}
			return redirectWithSuccess(aurl("packagerequests"),trans('admin.deleted'));
		}else {
			$packagerequests = PackageRequest::find($data);
			if(is_null($packagerequests) || empty($packagerequests)){
				return backWithError(trans('admin.undefinedRecord'),aurl("packagerequests"));
			}
                    
			it()->delete('packagerequest',$data);
			$packagerequests->delete();
			return redirectWithSuccess(aurl("packagerequests"),trans('admin.deleted'));
		}
	}
            

}