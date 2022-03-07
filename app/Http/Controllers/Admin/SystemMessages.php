<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SystemMessagesDataTable;
use Carbon\Carbon;
use App\Models\SystemMessage;

use App\Http\Controllers\Validations\SystemMessagesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]
class SystemMessages extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:systemmessages_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:systemmessages_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:systemmessages_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:systemmessages_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.38]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SystemMessagesDataTable $systemmessages)
            {
               return $systemmessages->render('admin.systemmessages.index',['title'=>trans('admin.systemmessages')]);
            }


            /**
             * Baboon Script By [it v 1.6.38]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.systemmessages.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.38]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(SystemMessagesRequest $request)
            {
                $data = $request->except("_token", "_method");
            			  		$systemmessages = SystemMessage::create($data); 

			return successResponseJson([
				"message" => trans("admin.added"),
				"data" => $systemmessages,
			]);
			 }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.38]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$systemmessages =  SystemMessage::find($id);
        		return is_null($systemmessages) || empty($systemmessages)?
        		backWithError(trans("admin.undefinedRecord"),aurl("systemmessages")) :
        		view('admin.systemmessages.show',[
				    'title'=>trans('admin.show'),
					'systemmessages'=>$systemmessages
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.38]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$systemmessages =  SystemMessage::find($id);
        		return is_null($systemmessages) || empty($systemmessages)?
        		backWithError(trans("admin.undefinedRecord"),aurl("systemmessages")) :
        		view('admin.systemmessages.edit',[
				  'title'=>trans('admin.edit'),
				  'systemmessages'=>$systemmessages
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.38]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new SystemMessagesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(SystemMessagesRequest $request,$id)
            {
              // Check Record Exists
              $systemmessages =  SystemMessage::find($id);
              if(is_null($systemmessages) || empty($systemmessages)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("systemmessages"));
              }
              $data = $this->updateFillableColumns(); 
              SystemMessage::where('id',$id)->update($data);

              $systemmessages = SystemMessage::find($id);
              return successResponseJson([
               "message" => trans("admin.updated"),
               "data" => $systemmessages,
              ]);
			}

            /**
             * Baboon Script By [it v 1.6.38]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$systemmessages = SystemMessage::find($id);
		if(is_null($systemmessages) || empty($systemmessages)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("systemmessages"));
		}
               
		it()->delete('systemmessage',$id);
		$systemmessages->delete();
		return redirectWithSuccess(aurl("systemmessages"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$systemmessages = SystemMessage::find($id);
				if(is_null($systemmessages) || empty($systemmessages)){
					return backWithError(trans('admin.undefinedRecord'),aurl("systemmessages"));
				}
                    	
				it()->delete('systemmessage',$id);
				$systemmessages->delete();
			}
			return redirectWithSuccess(aurl("systemmessages"),trans('admin.deleted'));
		}else {
			$systemmessages = SystemMessage::find($data);
			if(is_null($systemmessages) || empty($systemmessages)){
				return backWithError(trans('admin.undefinedRecord'),aurl("systemmessages"));
			}
                    
			it()->delete('systemmessage',$data);
			$systemmessages->delete();
			return redirectWithSuccess(aurl("systemmessages"),trans('admin.deleted'));
		}
	}
            

}